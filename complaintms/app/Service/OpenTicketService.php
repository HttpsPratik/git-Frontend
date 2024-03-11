<?php

namespace App\Service;

use App\Facade\LogActivity;
use App\Repository\Interfaces\TicketRepositoryInterface;
use App\Traits\SuccessMessage;
use Illuminate\Support\Facades\Auth;

class OpenTicketService
{
    use SuccessMessage;

    public function __construct(private TicketRepositoryInterface $ticketRepository)
    {
    }

    public function getAllTicket($request)
    {
        return $this->ticketRepository->getAllOpenTicket($request, 15);
    }

    public function getAllOpenTicketCount($fiscal_year_id = null)
    {
        return $this->ticketRepository->getAllOpenTicketCount($fiscal_year_id);
    }

    public function getTicketDetails($ticket_id)
    {
        return $this->ticketRepository->getOpenTicketDetails($ticket_id);
    }

    public function anonymousTicketDetail($request){
        return $this->ticketRepository->anonymousTicketDetail($request);
    }

    public function rejectTicket($ticket_id)
    {
        $res = $this->ticketRepository->rejectTicket($ticket_id);
        if ($res) {
            LogActivity::addToLog('Ticket Rejected - ' . '"' . $ticket_id . '"');
            $this->getTaskSuccessMessage('Ticket Rejected');
        } else {
            $this->getErrorMessage('Cannot Reject Ticket');
            throw new \Exception('Internal Server Error');
        }
        return $res;
    }

    public function closeTicket($ticket_id)
    {
        $res = $this->ticketRepository->closeTicket($ticket_id);
        if ($res) {
            LogActivity::addToLog('Ticket Closed - ' . '"' . $ticket_id . '"');
            $this->getTaskSuccessMessage('Ticket Closed');
        } else {
            $this->getErrorMessage('Cannot Close Ticket');
            throw new \Exception('Internal Server Error');
        }
        return $res;
    }

    public function changeStatus($request)
    {
        return $this->ticketRepository->openTicketChangeStatus($request['ticket_id']);
    }

    public function ticketUpdate($request)
    {
        if (array_key_exists('subject', $request)) {
            $data_array = [
                'category_id' => $request['category_id'],
                'subject' => $request['subject'],
                'status_date' => now(),
            ];
        } else {
            $data_array = [
                'category_id' => $request['category_id'],
                'status_date' => now(),
            ];
        }

        $this->ticketRepository->update($request['id'], $data_array);
        $this->getTaskSuccessMessage('Ticket Updated ');
        LogActivity::addToLog('Ticket Updated - ' . '"' . $request['id'] . '"');
    }

    public function getTicketIds($fiscal_year_id = null)
    {
        return $this->ticketRepository->getTicketIds($fiscal_year_id);
    }

    public function openNewTicket($request, $fiscal_year_id, $medium_id, $anonymousTicketService)
    {
        $user_id = Auth::guard('web')->check() && $request['privacy'] == 'none' ? Auth::guard('web')->id() : null;

        $data_array = [
            'status' => 'open',
            'status_date' => now(),
            'user_id' => $user_id,
            'ticket_number' => $this->generateTicketNumber(),
            'fiscal_year_id' => $fiscal_year_id,
            'subject' => $request['subject'],
            'category_id' => $request['category_id'],
            'medium_id' => $medium_id,
            'visible' => 0
        ];

        $ticket = $this->ticketRepository->create($data_array);

        if($user_id === null){
            $ticket->{"password"} = $anonymousTicketService->createNewOpenTicket($ticket->ticket_number);
        }

        return $ticket;
    }

    private function generateTicketNumber() {
        $chars = "ztau39y2sdnr846hfw7ceibkgpjqv5l1m";
        usleep(1000);
        $base = 33;
        $result = '';
        $num = explode(' ',microtime());
        $num[0] = substr(explode('.',$num[0])[1], 0, 3);
        $num = $num[1].$num[0];
        $num = gmp_init($num);

        while (gmp_cmp($num, 0) > 0) {
            $remainder = gmp_intval(gmp_mod($num, $base));
            $result = $chars[$remainder] . $result;
            $num = gmp_div_q($num, $base);
        }

        return "HM-$result";
    }

}
