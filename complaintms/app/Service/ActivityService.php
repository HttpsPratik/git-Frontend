<?php

namespace App\Service;

use App\Repository\Interfaces\ActivityRepositoryInterface;

class ActivityService
{

    public function __construct(private ActivityRepositoryInterface $activityRepository)
    { }

    public function getAllActivity($request)
    {
        return $this->activityRepository->getAllActivity($request, 15);
    }

}
