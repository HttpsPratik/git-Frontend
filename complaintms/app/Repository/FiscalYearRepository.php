<?php

namespace App\Repository;

use App\Models\FiscalYear;
use App\Repository\Interfaces\FiscalYearRepositoryInterface;

class FiscalYearRepository extends BaseRepository implements FiscalYearRepositoryInterface
{
    public function __construct(FiscalYear $model)
    {
        parent::__construct($model);
    }

    public function getFiscalYearActive()
    {
        return $this->model->select('id')->where('active', 1)->pluck('id')[0];
    }

    public function getAllFiscalYear()
    {
        return $this->model->orderBy('created_at', 'DESC')->get();
    }

    public function existsFiscalYearActive()
    {
        return $this->fieldExists('active', 1);
    }

    public function getActiveFiscalYear()
    {
        return $this->model->where('active', 1)->first()->year;
    }
}
