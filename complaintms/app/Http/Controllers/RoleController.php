<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleStoreRequest;
use App\Http\Requests\RoleUpdateRequest;
use App\Service\RoleService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RoleController extends Controller
{
    public function __construct(private RoleService $roleService)
    { }

    public function index()
    {
        $roles = $this->roleService->getRoles();
        return view('dashboard.pages.roles',compact('roles'));
    }

    public function allRoleName(){
        $roles = $this->roleService->getRoleName();
        return response()->json($roles, 202);
    }

    public function store(RoleStoreRequest $request)
    {
        try{
            DB::beginTransaction();
            $this->roleService->roleStore($request->validated());
            DB::commit();
            return redirect('/dashboard/roles');
        } catch(\Exception $exp){
            DB::rollBack();
            Log::alert($exp->getMessage());
            return view('dashboard.pages.errors');
        }
    }

    public function update(RoleUpdateRequest $request)
    {
        try{
            DB::beginTransaction();
            $this->roleService->roleUpdate($request->validated());
            DB::commit();
            return redirect('/dashboard/roles');
        } catch(\Exception $exp){
            DB::rollBack();
            Log::alert($exp->getMessage());
            return view('dashboard.pages.errors');
        }
    }

    public function destroy($role_id)
    {
        try{
            DB::beginTransaction();
            $this->roleService->deleteRole($role_id);
            DB::commit();
            return response()->json(['redirect' => '/dashboard/roles'], 202);
        } catch(\Exception $exp){
            DB::rollBack();
            Log::alert($exp->getMessage());
            return response()->json(['redirect' => '/dashboard/errors']);
        }
    }

}
