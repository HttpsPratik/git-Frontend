<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminEmailUpdateRequest;
use App\Http\Requests\AdminNameUpdateRequest;
use App\Http\Requests\AdminPasswordUpdateRequest;
use App\Http\Requests\AdminRoleUpdateRequest;
use App\Http\Requests\AdminDepartmentUpdateRequest;
use App\Http\Requests\AdminStoreRequest;
use App\Service\AdminService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function __construct(private AdminService $adminService)
    { }

    public function index()
    {
        $admins = $this->adminService->getAdmins();
        return view('dashboard.pages.admins',compact('admins'));
    }

    public function reloadCaptchaAdmin()
    {
        return response()->json(['captcha'=> captcha_img('flat')]);
    }

    public function store(AdminStoreRequest $request){
        try{
            DB::beginTransaction();
            $this->adminService->adminStore($request->validated());
            DB::commit();
            return redirect('/dashboard/admins');

        } catch(\Exception $exp){
            DB::rollBack();
            Log::alert($exp->getMessage());
            return view('dashboard.pages.errors');
        }
    }

    public function nameUpdate(AdminNameUpdateRequest $request)
    {
        try{
            DB::beginTransaction();
            $this->adminService->nameUpdateAdmin($request->validated());
            DB::commit();
            return redirect('/dashboard/admins');

        } catch(\Exception $exp){
            DB::rollBack();
            Log::alert($exp->getMessage());
            return view('dashboard.pages.errors');
        }

    }

    public function emailUpdate(AdminEmailUpdateRequest $request){

        try{
            DB::beginTransaction();
            $this->adminService->emailUpdateAdmin($request->validated());
            DB::commit();
            return redirect('/dashboard/admins');

        } catch(\Exception $exp){
            DB::rollBack();
            Log::alert($exp->getMessage());
            return view('dashboard.pages.errors');
        }

    }

    public function passwordUpdate(AdminPasswordUpdateRequest $request)
    {
        try{
            DB::beginTransaction();
            $this->adminService->passwordUpdateAdmin($request->validated());
            DB::commit();
            return redirect('/dashboard/admins');

        } catch(\Exception $exp){
            DB::rollBack();
            Log::alert($exp->getMessage());
            return view('dashboard.pages.errors');
        }
    }

    public function roleUpdate(AdminRoleUpdateRequest $request)
    {
        try{
            DB::beginTransaction();
            $this->adminService->roleUpdateAdmin($request->validated());
            DB::commit();
            return redirect('/dashboard/admins');

        } catch(\Exception $exp){
            DB::rollBack();
            Log::alert($exp->getMessage());
            return view('dashboard.pages.errors');
        }
    }

    public function departmentUpdate(AdminDepartmentUpdateRequest $request)
    {
        try{
            DB::beginTransaction();
            $this->adminService->departmentUpdateAdmin($request->validated());
            DB::commit();
            return redirect('/dashboard/admins');

        } catch(\Exception $exp){
            DB::rollBack();
            Log::alert($exp->getMessage());
            return view('dashboard.pages.errors');
        }
    }

    public function destroy($admin_id)
    {
        try{
            DB::beginTransaction();
            $this->adminService->deleteAdmin($admin_id);
            DB::commit();
            return response()->json(['redirect' => '/dashboard/admins'], 202);

        } catch(\Exception $exp){

            DB::rollBack();
            Log::alert($exp->getMessage());
            return response()->json(['redirect' => '/dashboard/errors']);
        }
    }

}
