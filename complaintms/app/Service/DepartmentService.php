<?php

namespace App\Service;

use App\Facade\LogActivity;
use App\Repository\Interfaces\DepartmentRepositoryInterface;
use App\Traits\SuccessMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DepartmentService
{
    use SuccessMessage;

    public function __construct(private DepartmentRepositoryInterface $departmentRepository,
                                private OpenTicketService             $openTicketService)
    {
    }

    public function getDepartmentName()
    {
        return $this->departmentRepository->getDepartmentName();
    }

    public function getAdminDepartmentId()
    {
        return Auth::guard('admin')->user()->department_id;
    }

    public function getTicketForwardDepartments()
    {
        return $this->departmentRepository->getTicketForwardDepartments();
    }

    public function getDepartmentCount($fiscal_year_id=null, $limit=null)
    {
        $ticket_ids = $this->openTicketService->getTicketIds($fiscal_year_id);
        return $this->departmentRepository->getDepartmentCount($ticket_ids,$limit);
    }

    public function departmentStore($request)
    {
        $data_array = [
            'name' => preg_replace('/[\s$@_*]+/', ' ', Str::title($request['name'])),
            'identifier' => $request['identifier'],
        ];
        $data = $this->departmentRepository->create($data_array);
        LogActivity::addToLog('Created Department - ' . '"' . $data->name . '"' . ' ' . '"' . $data->id . '"');
        if ($data->wasRecentlyCreated === true) {
            $this->getSuccessMessage('Department');
        }
        return $data;
    }

    public function departmentUpdate($request)
    {
        $data_array = [
            'name' => preg_replace('/[\s$@_*]+/', ' ', Str::title($request['name'])),
            'identifier' => $request['identifier'],
        ];
        $data = $this->departmentRepository->update($request['id'], $data_array);
        LogActivity::
        addToLog('Updated Department - ' . '"' . $data_array['name'] . '"' . ' ' . '"' . $request['id'] . '"');
        if ($data) {
            $this->getUpdateSuccessMessage('Department');
        }
        return $data;
    }

    public function getDepartments()
    {
        return $this->departmentRepository->getAllDepartments();
    }

    public function deleteDepartment($department_id)
    {
        $data = $this->departmentRepository->destroy($department_id);
        LogActivity::addToLog('Deleted Department - ' . '"' . $department_id . '"');
        if ($data) {
            $this->getDestroySuccessMessage('Department');
        }
        return $data;
    }

}
