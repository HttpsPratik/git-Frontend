<?php

namespace App\Repository\Interfaces;

interface FiscalYearRepositoryInterface
{
    public function getFiscalYearActive();

    public function getAllFiscalYear();

    public function existsFiscalYearActive();

    public function getActiveFiscalYear();
}
