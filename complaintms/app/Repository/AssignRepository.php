<?php

namespace App\Repository;

use App\Models\Assign;
use App\Repository\Interfaces\AssignRepositoryInterface;

class AssignRepository extends BaseRepository implements AssignRepositoryInterface
{
    public function __construct(Assign $model)
    {
        parent::__construct($model);
    }

    public function getFirstAssign($ticket_id)
    {
        return $this->model->select('id', 'department_id')->where('ticket_id', $ticket_id)->orderBy('created_at')->first();
    }

    public function getLatestAssign($ticket_id)
    {
        return $this->model->select('id', 'department_id')->where('ticket_id', $ticket_id)->orderBy('created_at', 'desc')->first();
    }
}
