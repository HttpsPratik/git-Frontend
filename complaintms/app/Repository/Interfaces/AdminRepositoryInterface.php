<?php

namespace App\Repository\Interfaces;

interface AdminRepositoryInterface
{
    public function getAllAdmins();

    public function getDepartmentAdmins($department_id);
}
