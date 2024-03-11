<?php

namespace App\Repository\Interfaces;

interface ActivityRepositoryInterface
{
    public function getAllActivity($request, $paginator);
}
