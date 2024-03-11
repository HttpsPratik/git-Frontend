<?php

namespace App\Helpers;

use App\Repository\Interfaces\ActivityRepositoryInterface;
use App\Service\FiscalYearService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogActivity
{
    private string $ip_address;
    private string $user_agent;

    public function __construct(Request $request,
                                private ActivityRepositoryInterface $activityRepository,
                                private FiscalYearService $fiscalYearService)
    {
        $this->ip_address = $request->ip();
        $this->user_agent = $request->userAgent();
    }

    public function addToLog($description, $admin_id = null): void
    {
        $fiscal_year_id = $this->fiscalYearService->getFiscalYearActiveId();

        $this->activityRepository->create([
            'admin_id' => $admin_id ?? Auth::guard('admin')->id(),
            'ip_address' => $this->ip_address,
            'user_agent' => $this->user_agent,
            'fiscal_year_id' => $fiscal_year_id,
            'description' => $description,
        ]);
    }
}
