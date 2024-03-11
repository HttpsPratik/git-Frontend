<?php

namespace App\Repository;

use App\Models\AnonymousTicket;
use App\Repository\Interfaces\AnonymousTicketRepositoryInterface;

class AnonymousTicketRepository extends BaseRepository implements AnonymousTicketRepositoryInterface
{
    public function __construct(AnonymousTicket $model)
    {
        parent::__construct($model);
    }

    /*public function anonymousTicketDetail($request){
        return $this->model
            ->with('ticket')
            ->where('ticket_number', $request['ticket_number'])
            ->first();
    }*/
}
