<?php

namespace App\Service;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Repository\Interfaces\AnonymousTicketRepositoryInterface;
//use App\Traits\SuccessMessage;

class AnonymousTicketService
{
    //use SuccessMessage;

    public function __construct(private AnonymousTicketRepositoryInterface $anonymousTicketRepository)
    {
    }

    public function createNewOpenTicket($ticket_number)
    {
        $password = Str::random(32);
        $data_array = [
            'ticket_number' => $ticket_number,
            'password' => Hash::make($password),
        ];

        $this->anonymousTicketRepository->create($data_array);
        return $password;
    }
}
