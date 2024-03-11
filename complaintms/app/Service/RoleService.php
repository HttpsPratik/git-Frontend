<?php

namespace App\Service;

use App\Facade\LogActivity;
use App\Repository\Interfaces\RoleRepositoryInterface;
use App\Traits\SuccessMessage;
use Illuminate\Support\Str;

class RoleService
{
    use SuccessMessage;
    public function __construct(private RoleRepositoryInterface $roleRepository)
    { }

    public function getRoleName()
    {
        return $this->roleRepository->getRoleName();
    }

    public function getRoles()
    {
        return $this->roleRepository->all();
    }

    public function roleStore($request)
    {
        $data_array = [
            'name'=> preg_replace('/[\s$@_*]+/', ' ', Str::title($request['name'])),
            'role'=> $request['role'],
            'description' => $request['description']
        ];

        $data = $this->roleRepository->create($data_array);
        LogActivity::addToLog('Created Role - '. '"'.$data->id.'"');
        $this->getSuccessMessage('Role');
        return $data;
    }

    public function roleUpdate($request)
    {
        $data_array = [
            'name'=> preg_replace('/[\s$@_*]+/', ' ', Str::title($request['name'])),
            'role'=> $request['role'],
            'description' => $request['description']
        ];

        $data = $this->roleRepository->update( $request['id'] , $data_array );
        LogActivity::addToLog('Updated Role - '. '"'.$request['id'].'"');
        $this->getUpdateSuccessMessage('Role');
        return $data;

    }

    public function deleteRole($role_id)
    {
        $this->getDestroySuccessMessage('Role');
        $data = $this->roleRepository->destroy($role_id);
        LogActivity::addToLog('Deleted Role - '. '"'.$role_id.'"');
        return $data;
    }


}
