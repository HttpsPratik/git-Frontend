<?php

namespace App\Repository\Interfaces;

interface ConversationRepositoryInterface
{
    public function getOpenTicketConversationDescription($ticket_id);

    public function getAllConversationTicket($ticket_id);
}
