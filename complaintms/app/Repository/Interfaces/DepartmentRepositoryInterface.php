<?php

namespace App\Repository\Interfaces;

interface DepartmentRepositoryInterface
{

    public function getDepartmentName();

    public function getAllDepartments();

    public function getTicketForwardDepartments();

    public function getDepartmentCount($ticket_ids, $limit = null);
}
