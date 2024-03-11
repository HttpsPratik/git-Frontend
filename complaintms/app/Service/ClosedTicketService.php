<?php

namespace App\Service;

use App\Facade\LogActivity;
use App\Repository\Interfaces\TicketRepositoryInterface;

class ClosedTicketService
{
    public function __construct(private TicketRepositoryInterface $ticketRepository)
    {
    }

    public function getAllClosedTicket($request)
    {
        return $this->ticketRepository->getAllClosedTicket($request, 15);
    }

    public function getTicketDetails($ticket_id)
    {
        return $this->ticketRepository->getClosedTicketDetails($ticket_id);
    }

    public function getAllClosedTicketCount($fiscal_year_id=null)
    {
        return $this->ticketRepository->getAllClosedTicketCount($fiscal_year_id);
    }

    public function publishTicket($ticket_id)
    {
        LogActivity::addToLog("Ticket Published - ".'"'.$ticket_id.'"');
        return $this->ticketRepository->publishClosedTicket($ticket_id);
    }

}
