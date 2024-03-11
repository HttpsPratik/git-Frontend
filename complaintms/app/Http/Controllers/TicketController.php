<?php

namespace App\Http\Controllers;

use App\Exceptions\ErrorPageException;
use App\Facade\LogActivity;
use App\Service\AssignService;
use App\Traits\SuccessMessage;
use App\Service\AttachmentService;
use App\Service\OpenTicketService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Service\ClosedTicketService;
use App\Service\ConversationService;
use Illuminate\Support\Facades\Gate;
use App\Service\RejectedTicketService;
use App\Service\ProcessingTicketService;
use App\Http\Requests\OpenTicketSearchRequest;
use App\Http\Requests\OpenTicketUpdateRequest;
use App\Http\Requests\ForwardOpenTicketRequest;
use App\Http\Requests\ClosedTicketSearchRequest;
use App\Http\Requests\RejectedTicketSearchRequest;
use App\Http\Requests\ProcessingTicketSearchRequest;
use App\Http\Requests\OpenTicketConversationStoreRequest;
use App\Http\Requests\ProcessingTicketConversationStoreRequest;
use App\Http\Requests\TicketViewPermissionRequest;

class TicketController extends Controller
{
    use SuccessMessage;

    public function ticketViewPermission(TicketViewPermissionRequest $request){
        $permission = Gate::allows('ticket-view-permission', $request->ticket_id);
        return response()->json($permission);
    }

    //open ticket start
    public function openTicket(OpenTicketSearchRequest $request,
                               OpenTicketService $openTicketService)
    {
        $openTickets = $openTicketService->getAllTicket($request->validated())->withQueryString();
        return view('dashboard.pages.open_tickets', compact('openTickets'));
    }

    public function openTicketDetails($ticket_id,
                                      OpenTicketService $openTicketService,
                                      ConversationService $conversationService)
    {
        $ticket = $openTicketService->getTicketDetails($ticket_id);
        $conversations = $conversationService->getAllConversationTicket($ticket_id);
        return view('dashboard.pages.open_ticket_details', compact('ticket', 'conversations'));
    }

    public function openTicketReject($ticket_id, OpenTicketService $openTicketService)
    {
        try {
            DB::beginTransaction();
            $openTicketService->rejectTicket($ticket_id);
            DB::commit();
            return response()->json(['redirect' => '/dashboard/ticket/open'], 202);
        } catch (\Exception $exp) {
            DB::rollBack();
            Log::alert($exp->getMessage());
            return response()->json(['redirect' => '/dashboard/errors']);
        }
    }

    public function openTicketClose($ticket_id, OpenTicketService $openTicketService)
    {
        try {
            DB::beginTransaction();
            $openTicketService->closeTicket($ticket_id);
            DB::commit();
            return response()->json(['redirect' => '/dashboard/ticket/open'], 202);
        } catch (\Exception $exp) {
            DB::rollBack();
            Log::alert($exp->getMessage());
            return response()->json(['redirect' => '/dashboard/errors']);
        }
    }

    public function forwardOpenTicket(ForwardOpenTicketRequest $request,
                                      OpenTicketService $openTicketService,
                                      AssignService $assignService)
    {
        try {
            DB::beginTransaction();
            $assignService->assignOpenTicket($request->validated());
            $openTicketService->changeStatus($request->validated());
            DB::commit();
            return redirect('/dashboard/ticket/open');
        } catch (\Exception $exp) {
            DB::rollBack();
            Log::alert($exp->getMessage());
            return view('dashboard.pages.errors');
        }
    }

    public function openTicketConversation(OpenTicketConversationStoreRequest $request,
                                           ConversationService $conversationService,
                                            AttachmentService $attachmentService)
    {
        try {
            DB::beginTransaction();
            $conversation = $conversationService->addConversationOpenTicket($request->validated());
            $attachmentService->saveAttachments($request->validated(), $conversation->id);
            LogActivity::addToLog('Conversation added - '
                . ' ticket "' . $request->ticket_id . '"' . ' conversation ' . '"' . $conversation->id . '"');
            DB::commit();
            $this->getTaskSuccessMessage('Conversation Added');
            return redirect()->back();
        } catch (ErrorPageException $e) {
            DB::rollBack();
            $this->getErrorMessage($e->getMessage());
            return view('dashboard.pages.errors');
        } catch (\Exception $exp) {
            DB::rollBack();
            Log::alert($exp->getMessage());
            return view('dashboard.pages.errors');
        }
    }

    public function openTicketUpdate(OpenTicketUpdateRequest $request,
                                     OpenTicketService $openTicketService)
    {
        try {
            DB::beginTransaction();
            $openTicketService->ticketUpdate($request->validated());
            DB::commit();
            return redirect()->back();
        } catch (\Exception $exp) {
            DB::rollBack();
            Log::alert($exp->getMessage());
            return view('dashboard.pages.errors');
        }
    }

    //open ticket end



    //processing ticket start
    public function processingTicket(ProcessingTicketSearchRequest $request,
                                     ProcessingTicketService $processingTicketService)
    {
        $processingTickets = $processingTicketService->getAllProcessingTicket($request->validated())->withQueryString();
        return view('dashboard.pages.processing_tickets', compact('processingTickets'));
    }

    public function processingTicketDetails($ticket_id,
                                      ProcessingTicketService $processingTicketService,
                                      ConversationService $conversationService)
    {
        $ticket = $processingTicketService->getProcessingTicketDetails($ticket_id);
        $conversations = $conversationService->getAllConversationTicket($ticket_id);
        return view('dashboard.pages.processing_ticket_details', compact('ticket', 'conversations'));
    }

    public function processingTicketConversation(ProcessingTicketConversationStoreRequest $request,
                                                 ConversationService $conversationService,
                                                 AttachmentService $attachmentService)
    {
        try {
            DB::beginTransaction();
            $conversation = $conversationService->addConversationProcessingTicket($request->validated());
            $attachmentService->saveAttachments($request->validated(), $conversation->id);
            LogActivity::addToLog('Conversation added - '
                . ' ticket "' . $request->ticket_id . '"' . ' conversation ' . '"' . $conversation->id . '"');
            DB::commit();
            $this->getTaskSuccessMessage('Conversation Added');
            return redirect()->back();
        } catch (ErrorPageException $e) {
            DB::rollBack();
            $this->getErrorMessage($e->getMessage());
            return view('dashboard.pages.errors');
        } catch (\Exception $exp) {
            DB::rollBack();
            Log::alert($exp->getMessage());
            return view('dashboard.pages.errors');
        }
    }

    public function forwardProcessingTicket(ForwardOpenTicketRequest $request,
                                      ProcessingTicketService $processingTicketService,
                                      AssignService $assignService)
    {
        try {
            DB::beginTransaction();
            $assignService->assignProcessingTicket($request->validated());
            $processingTicketService->changeStatus($request->validated());
            DB::commit();
            return redirect('/dashboard/ticket/processing');
        } catch (\Exception $exp) {
            DB::rollBack();
            Log::alert($exp->getMessage());
            return view('dashboard.pages.errors');
        }
    }

    public function processingTicketReject($ticket_id, ProcessingTicketService $processingTicketService)
    {
        try {
            DB::beginTransaction();
            $processingTicketService->rejectTicket($ticket_id);
            DB::commit();
            return response()->json(['redirect' => '/dashboard/ticket/processing'], 202);
        } catch (\Exception $exp) {
            DB::rollBack();
            Log::alert($exp->getMessage());
            return response()->json(['redirect' => '/dashboard/errors']);
        }
    }

    public function processingTicketClose($ticket_id, ProcessingTicketService $processingTicketService)
    {
        try {
            DB::beginTransaction();
            $processingTicketService->closeTicket($ticket_id);
            DB::commit();
            return response()->json(['redirect' => '/dashboard/ticket/processing'], 202);
        } catch (\Exception $exp) {
            DB::rollBack();
            Log::alert($exp->getMessage());
            return response()->json(['redirect' => '/dashboard/errors']);
        }
    }

    //processing ticket end



    //closed ticket start
    public function closedTicket(ClosedTicketSearchRequest $request, ClosedTicketService $closedTicketService)
    {
        $closedTickets = $closedTicketService->getAllClosedTicket($request->validated())->withQueryString();
        return view('dashboard.pages.closed_tickets', compact('closedTickets'));
    }

    public function closedTicketDetails($ticket_id, ClosedTicketService $closedTicketService, ConversationService $conversationService)
    {
        $ticket = $closedTicketService->getTicketDetails($ticket_id);
        $conversations = $conversationService->getAllConversationTicket($ticket_id);
        return view('dashboard.pages.closed_ticket_details', compact('ticket', 'conversations'));
    }

    public function closedTicketPublish($ticket_id,ClosedTicketService $closedTicketService)
    {
        try {
            DB::beginTransaction();
            $closedTicketService->publishTicket($ticket_id);
            DB::commit();
            $this->getTaskSuccessMessage('Ticket Published Successfully');
            return response()->json(['redirect' => '/dashboard/ticket/closed'], 202);
        } catch (\Exception $exp) {
            DB::rollBack();
            Log::alert($exp->getMessage());
            return response()->json(['redirect' => '/dashboard/errors']);
        }
    }
    //closed ticket end



    //rejected ticket start
    public function rejectedTicket(RejectedTicketSearchRequest $request, RejectedTicketService $rejectedTicketService)
    {
        $rejectedTickets = $rejectedTicketService->getAllRejectedTicket($request->validated())->withQueryString();
        return view('dashboard.pages.rejected_tickets', compact('rejectedTickets'));
    }

    public function rejectedTicketDetails($ticket_id, RejectedTicketService $rejectedTicketService, ConversationService $conversationService)
    {
        $ticket = $rejectedTicketService->getTicketDetails($ticket_id);
        $conversations = $conversationService->getAllConversationTicket($ticket_id);
        return view('dashboard.pages.rejected_ticket_details', compact('ticket', 'conversations'));
    }
    //rejected ticket start

}
