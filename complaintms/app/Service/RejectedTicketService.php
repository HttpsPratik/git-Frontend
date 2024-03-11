<?php

namespace App\Service;

use App\Repository\Interfaces\TicketRepositoryInterface;

class RejectedTicketService
{
    public function __construct(private TicketRepositoryInterface $ticketRepository)
    {
    }

    public function getAllRejectedTicket($request)
    {
        return $this->ticketRepository->getAllRejectedTicket($request, 15);
    }

    public function getTicketDetails($ticket_id)
    {
        return $this->ticketRepository->getRejectedTicketDetails($ticket_id);
    }

    public function getAllRejectedTicketCount($fiscal_year_id=null)
    {
        return $this->ticketRepository->getAllRejectedTicketCount($fiscal_year_id);
    }

}
