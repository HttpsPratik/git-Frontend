<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivitySearchRequest;
use App\Models\Activity;
use App\Service\ActivityService;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function __construct(private ActivityService $activityService)
    { }

    public function index(ActivitySearchRequest $request)
    {
        $activities = $this->activityService->getAllActivity($request->validated())->withQueryString();
        return view('dashboard.pages.activities', compact('activities'));
    }

}
