<?php

namespace App\Repository;

use App\Models\Department;
use App\Repository\Interfaces\DepartmentRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DepartmentRepository extends BaseRepository implements DepartmentRepositoryInterface
{
    public function __construct(Department $model)
    {
        parent::__construct($model);
    }

    public function getDepartmentName()
    {
        return $this->model->all(['id', 'name']);
    }

    public function getAllDepartments()
    {
        return $this->model->all(['id', 'identifier', 'name']);
    }

    public function getTicketForwardDepartments()
    {
        return $this->model
            ->select('id', 'name')
            ->where('id', '!=', Auth::guard('admin')->user()->department_id)
            ->get();
    }

    public function getDepartmentCount($ticket_ids, $limit = null)
    {
        $assigns = DB::table(function ($query) use ($ticket_ids) {
            $query->select([
                'ticket_id', DB::raw('MAX(created_at) as latest_created_at'),
                DB::raw('SUBSTRING_INDEX(GROUP_CONCAT(id ORDER BY created_at DESC), ",", 1) as latest_assign_id'),
                DB::raw('SUBSTRING_INDEX(GROUP_CONCAT(department_id ORDER BY created_at DESC), ",", 1) as latest_department_id')
            ])
                ->from('assigns')
                ->whereIn('ticket_id', $ticket_ids)
                ->groupBy('ticket_id');
        }, 'latest_assigns')
            ->select(['latest_department_id', DB::raw('COUNT(*) as department_id_count')])
            ->groupBy('latest_department_id');

        return DB::table('departments as t1')
            ->joinSub($assigns, 't2', function ($join) {
                $join->on('t1.id', '=', 't2.latest_department_id');
            })
            ->select(['t1.id', 't1.name', 't1.identifier', 't2.department_id_count'])
            ->orderByRaw('t2.department_id_count DESC')
            ->when($limit != null, function ($q) use ($limit) {
                $q->limit($limit);
            })
            ->get();
    }
}
