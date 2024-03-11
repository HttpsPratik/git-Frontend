<?php

namespace App\Http\Controllers\Frontend;

use App\Exceptions\ErrorPageException;
use App\Http\Requests\SearchTicketRequest;
use App\Models\Ticket;
//use Illuminate\Http\Request;
use App\Service\MediaService;
use App\Service\AssignService;
use App\Traits\SuccessMessage;
use App\Service\AttachmentService;
use App\Service\FiscalYearService;
use App\Service\OpenTicketService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Service\ConversationService;
use App\Service\AnonymousTicketService;
use App\Http\Requests\ComplainStoreRequest;

class PageController extends Controller
{
    use SuccessMessage;
    public function index()
    {
        return view('frontend.pages.index');
    }

    public function search()
    {
        return view('frontend.pages.grievance-search');
    }

    public function single($id)
    {
        $ticket = Ticket::where('id', $id)->first();
        return view('frontend.pages.grievance-detail')
            ->with('ticket', $ticket);
    }

    public function register()
    {
        return view('frontend.pages.grievance-register');
    }

    public function searchTicket(SearchTicketRequest $request,
                                 OpenTicketService $openTicketService)
    {
        $ticket = $openTicketService->anonymousTicketDetail($request->validated());
        return view('frontend.pages.grievance-detail', compact('ticket'));
    }

    public function store(ComplainStoreRequest $request,
                          OpenTicketService    $openTicketService,
                          ConversationService  $conversationService,
                          AssignService        $assignService,
                          AttachmentService    $attachmentService,
                          FiscalYearService    $fiscalYearService,
                          MediaService         $mediumService,
                          AnonymousTicketService $anonymousTicketService)
    {

        try {
            DB::beginTransaction();

            $ticket = $openTicketService->openNewTicket($request->validated(),
                $fiscalYearService->getFiscalYearActiveId(),
                $mediumService->getMediumId('Website'), $anonymousTicketService);

            $conversation = $conversationService->openTicketConversation($request->validated(),$ticket->id);

            $assignService->assignNewOpenTicket($ticket->id);

            $attachmentService->saveAttachments($request->validated(),$conversation->id);

            DB::commit();

            $this->getTaskSuccessMessage('दर्ता टिकट सफलतापूर्वक पेश गरियो');

            $anonymous_ticket = isset($ticket->password)?
            ['ticket_number' => $ticket->ticket_number, 'ticket_password' => $ticket->password ] :  [] ;

            return redirect('/gunaso/register')->with($anonymous_ticket);
        } catch (ErrorPageException $e) {
            DB::rollBack();
            $this->getErrorMessage($e->getMessage());
            abort(500, 'Oops, looks like server didn\'t responded, try again later');
        } catch (\Exception $exp) {
            DB::rollBack();
            Log::alert($exp->getMessage());
            abort(500, 'Oops, looks like server didn\'t responded, try again later');
        }

    }
    public function userTickets()
    {
        $tickets =  Ticket::select(['created_at','id','subject','ticket_number'])->where('user_id', Auth::guard('web')->id())->orderBy('created_at','desc')->paginate(10);
        return view('frontend.pages.user-tickets', compact('tickets'));
    }

    public function userTicketDetails($ticket_number)
    {
        if(Ticket::where('ticket_number', $ticket_number)
            ->where('user_id', Auth::guard('web')->id())
            ->exists())
        {
            $ticket = Ticket::where('ticket_number', $ticket_number)
                ->where('user_id', Auth::guard('web')->id())
                ->first();
            return view('frontend.pages.grievance-detail', compact('ticket'));

        } else abort(404);
    }
}
