<?php

namespace App\Repository;

use App\Models\Role;
use App\Repository\Interfaces\RoleRepositoryInterface;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{
    public function __construct(Role $model)
    {
        parent::__construct($model);
    }

    public function getRoleName()
    {
        return $this->model->all(['id', 'name']);
    }
}
