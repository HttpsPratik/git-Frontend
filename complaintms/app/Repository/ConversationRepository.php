<?php

namespace App\Repository;

use App\Models\Conversation;
use App\Repository\Interfaces\ConversationRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ConversationRepository extends BaseRepository implements ConversationRepositoryInterface
{
    public function __construct(Conversation $model)
    {
        parent::__construct($model);
    }

    public function getOpenTicketConversationDescription($ticket_id)
    {
        return $this->model
            ->with('attachments')
            ->with(['department' => function ($q) {
                $q->select('id', 'name')->withTrashed();
            }])
            ->select('id', 'description')
            ->where('ticket_id', $ticket_id)
            ->where('department_id', null)
            ->orderBy('created_at')
            ->first();
    }

    public function getAllConversationTicket($ticket_id)
    {
        return $this->model
            ->with('attachments')
            ->with(['department' => function ($q) {
                $q->select('id', 'name')->withTrashed();
            }])
            ->where('ticket_id', $ticket_id)
            ->orderBy('created_at')
            ->get();
    }
}
