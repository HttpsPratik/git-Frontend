<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentStoreRequest;
use App\Http\Requests\DepartmentUpdateRequest;
use App\Service\DepartmentService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DepartmentController extends Controller
{
    public function __construct(private DepartmentService $departmentService)
    { }

    public function index()
    {
        $departments = $this->departmentService->getDepartments();
        return view('dashboard.pages.departments',compact('departments'));
    }

    public function allDepartmentName(){
        $departments = $this->departmentService->getDepartmentName();
        return response()->json($departments, 202);
    }

    public function ticketForwardDepartments(){
        $departments = $this->departmentService->getTicketForwardDepartments();
        return response()->json($departments, 202);
    }

    public function store(DepartmentStoreRequest $request)
    {
        try{
            DB::beginTransaction();
            $this->departmentService->departmentStore($request->validated());
            DB::commit();
            return redirect('/dashboard/departments');
        } catch(\Exception $exp){
            DB::rollBack();
            Log::alert($exp->getMessage());
            return view('dashboard.pages.errors');
        }
    }

    public function update(DepartmentUpdateRequest $request)
    {
        try{
            DB::beginTransaction();
            $this->departmentService->departmentUpdate($request->validated());
            DB::commit();
            return redirect('/dashboard/departments');
        } catch(\Exception $exp){
            DB::rollBack();
            Log::alert($exp->getMessage());
            return view('dashboard.pages.errors');
        }
    }

    public function destroy($department_id)
    {
        try{
            DB::beginTransaction();
            $this->departmentService->deleteDepartment($department_id);
            DB::commit();
            return response()->json(['redirect' => '/dashboard/departments'], 202);
        } catch(\Exception $exp){
            DB::rollBack();
            Log::alert($exp->getMessage());
            return response()->json(['redirect' => '/dashboard/errors']);
        }
    }

}
