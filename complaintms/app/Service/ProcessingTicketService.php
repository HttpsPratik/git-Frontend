<?php

namespace App\Service;

use App\Facade\LogActivity;
use App\Repository\Interfaces\TicketRepositoryInterface;
use App\Traits\SuccessMessage;

class ProcessingTicketService
{
    use SuccessMessage;

    public function __construct(private TicketRepositoryInterface $ticketRepository)
    {
    }

    public function getAllProcessingTicket($request)
    {
        return $this->ticketRepository->getAllProcessingTicket($request, 15);
    }

    public function getAllProcessingTicketCount($fiscal_year_id = null)
    {
        return $this->ticketRepository->getAllProcessingTicketCount($fiscal_year_id);
    }

    public function getProcessingTicketDetails($ticket_id)
    {
        return $this->ticketRepository->getProcessingTicketDetails($ticket_id);
    }

    public function changeStatus($request)
    {
        return $this->ticketRepository->processingTicketChangeStatus($request['ticket_id']);
    }

    public function getDashboardProcessingTickets()
    {
        return $this->ticketRepository->getDashboardProcessingTickets();
    }

    public function rejectTicket($ticket_id)
    {
        $res = $this->ticketRepository->rejectTicket($ticket_id);
        if ($res) {
            LogActivity::addToLog('Ticket Rejected - ' . '"' . $ticket_id . '"');
            $this->getTaskSuccessMessage('Ticket Rejected');
            return $res;
        } else {
            $this->getErrorMessage('Cannot Reject Ticket');
            return $res;
        }
    }

    public function closeTicket($ticket_id)
    {
        $res = $this->ticketRepository->closeTicket($ticket_id);
        if ($res) {
            LogActivity::addToLog('Ticket Closed - ' . '"' . $ticket_id . '"');
            $this->getTaskSuccessMessage('Ticket Closed');
            return $res;
        } else {
            $this->getErrorMessage('Cannot Close Ticket');
            return $res;
        }
    }

}
