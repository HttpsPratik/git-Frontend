<?php

namespace App\Http\Controllers;

use App\Http\Requests\FiscalYearStoreRequest;
use App\Http\Requests\FiscalYearUpdateRequest;
use App\Service\FiscalYearService;
use App\Traits\SuccessMessage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class FiscalYearController extends Controller
{
    use SuccessMessage;
    public function __construct(private FiscalYearService $fiscalYearService)
    { }

    public function index()
    {
        $fiscalYears = $this->fiscalYearService->getAllFiscalYears();
        return view('dashboard.pages.fiscal_years', compact('fiscalYears'));
    }

    public function getAllFiscalYear(){
        $fiscalYears = $this->fiscalYearService->getAllFiscalYears();
        return response()->json($fiscalYears);
    }

    public function store(FiscalYearStoreRequest $request)
    {
        try{
            DB::beginTransaction();
            $this->fiscalYearService->fiscalYearStore($request->validated());
            DB::commit();
            return redirect('/dashboard/fiscal-years');
        } catch(\Exception $exp){
            DB::rollBack();
            Log::alert($exp->getMessage());
            return view('dashboard.pages.errors');
        }
    }

    public function update(FiscalYearUpdateRequest $request)
    {
        try{
            DB::beginTransaction();
            $this->fiscalYearService->fiscalYearUpdate($request->validated());
            DB::commit();
            return redirect('/dashboard/fiscal-years');
        } catch(\Exception $exp){
            DB::rollBack();
            Log::alert($exp->getMessage());
            return view('dashboard.pages.errors');
        }
    }

    public function destroy($fiscal_year_id)
    {
        try{
            DB::beginTransaction();
            $this->fiscalYearService->deleteFiscalYear($fiscal_year_id);
            DB::commit();
            return response()->json(['redirect' => '/dashboard/fiscal-years']);
        } catch(\Exception $exp) {
            DB::rollBack();
            Log::alert($exp->getMessage());
            return response()->json(['redirect' => '/dashboard/errors']);
        }
    }

}
