<?php

namespace App\Service;

use App\Facade\LogActivity;
use App\Repository\Interfaces\AdminRepositoryInterface;
use App\Traits\SuccessMessage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminService
{
    use SuccessMessage;
    public function __construct(private AdminRepositoryInterface $adminRepository)
    { }

    public function getAdmins()
    {
        return $this->adminRepository->getAllAdmins();
    }

    public function getDepartmentAdmins($department_id)
    {
        return $this->adminRepository->getDepartmentAdmins($department_id);
    }

    public function adminStore($request){

        $data_array = [
            'name'=> preg_replace('/[\s$@_*]+/', ' ', Str::title($request['name'])),
            'email'=> Str::lower($request['email']),
            'password'=> Hash::make($request['password']),
            'role_id' => $request['role_id'],
            'department_id' => $request['department_id']
        ];

        $this->getSuccessMessage('User');
        $data = $this->adminRepository->create($data_array);
        LogActivity::addToLog('Created Admin - '. '"'.$data->id.'"');
        return $data;
    }

    public function nameUpdateAdmin($request)
    {
        $this->getUpdateSuccessMessage('User name');
        $data = $this->adminRepository->update($request['id'],
            ['name'=> preg_replace('/[\s$@_*]+/', ' ', Str::title($request['name'])),]);
        LogActivity::addToLog('Updated Admin Name - '.'"'.$request['id'].'"');
        return $data;
    }

    public function emailUpdateAdmin($request)
    {
        $this->getUpdateSuccessMessage('User email');
        $data = $this->adminRepository->update($request['id'] ,
            ['email'=> Str::lower($request['email'])]);
        LogActivity::addToLog('Updated Admin Email - '.'"'.$request['id'].'"');
        return $data;
    }

    public function passwordUpdateAdmin($request)
    {
        $this->getUpdateSuccessMessage('User Password');
        $data = $this->adminRepository->update( $request['id'] ,
            ['password' => Hash::make($request['password'])]);
        LogActivity::addToLog('Updated Admin Password - '.'"'.$request['id'].'"');
        return $data;
    }

    public function roleUpdateAdmin($request)
    {
        $this->getUpdateSuccessMessage('User Role');
        $data = $this->adminRepository->update( $request['id'] ,['role_id' => $request['role_id']]);
        LogActivity::addToLog('Updated Admin Role - '.'"'.$request['id'].'"');
        return $data;
    }

    public function departmentUpdateAdmin($request)
    {
        $this->getUpdateSuccessMessage('User Department');
        $data = $this->adminRepository->update( $request['id'] ,
            ['department_id' => $request['department_id']]);
        LogActivity::addToLog('Updated Admin Department - '.'"'.$request['id'].'"');
        return $data;
    }

    public function deleteAdmin($admin_id)
    {
        $this->getDestroySuccessMessage('Admin');
        $data = $this->adminRepository->destroy($admin_id);
        LogActivity::addToLog('Removed Admin - '. '"'.$admin_id.'"');
        return $data;
    }
}
