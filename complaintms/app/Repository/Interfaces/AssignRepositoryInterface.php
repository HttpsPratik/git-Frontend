<?php

namespace App\Repository\Interfaces;

interface AssignRepositoryInterface
{
    public function getFirstAssign($ticket_id);

    public function getLatestAssign($ticket_id);
}
