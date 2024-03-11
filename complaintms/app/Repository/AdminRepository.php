<?php

namespace App\Repository;

use App\Models\Admin;
use App\Repository\Interfaces\AdminRepositoryInterface;

class AdminRepository extends BaseRepository implements AdminRepositoryInterface
{
    public function __construct(Admin $model)
    {
        parent::__construct($model);
    }

    public function getAllAdmins()
    {
        return $this->model
            ->with('department:id,name')
            ->with('role:id,name')
            ->get();
    }

    public function getDepartmentAdmins($department_id)
    {
        return $this->model
            ->with('department')
            ->select('id', 'name')
            ->whereHas('department', function ($q) use ($department_id) {
                $q->select('id', 'name')->where('id', $department_id);
            })
            ->get();
    }

}
