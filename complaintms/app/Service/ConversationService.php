<?php

namespace App\Service;

use App\Repository\Interfaces\ConversationRepositoryInterface;
use App\Traits\SuccessMessage;
use Illuminate\Support\Facades\Auth;

class ConversationService
{
    use SuccessMessage;

    public function __construct(private ConversationRepositoryInterface $conversationRepository)
    {
    }

    public function getOpenTicketConversationDescription($ticket_id)
    {
        return $this->conversationRepository->getOpenTicketConversationDescription($ticket_id);
    }

    public function addConversationProcessingTicket($request)
    {
        return $this->addConversation($request);
    }

    public function addConversationOpenTicket($request)
    {
        return $this->addConversation($request);
    }

    private function addConversation($request)
    {
        $publish = isset($request['publish']) ? 1 : 0;
        $data_array = [
            'ticket_id' => $request['ticket_id'],
            'description' => $request['description'],
            'department_id' => Auth::guard('admin')->user()->department_id,
            'publish' => $publish
        ];

        return $this->conversationRepository->create($data_array);
    }

    public function getAllConversationTicket($ticket_id)
    {
        return $this->conversationRepository->getAllConversationTicket($ticket_id);
    }

    public function openTicketConversation($request, $ticket_id){
        $data_array = [
            'ticket_id' => $ticket_id,
            'description' => $request['description'],
            'department_id' => null,
            'publish' => 1
        ];

        return $this->conversationRepository->create($data_array);
    }

}
