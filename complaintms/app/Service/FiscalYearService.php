<?php

namespace App\Service;

use App\Facade\LogActivity;
use App\Repository\Interfaces\FiscalYearRepositoryInterface;
use App\Traits\SuccessMessage;

class FiscalYearService
{
    use SuccessMessage;
    public function __construct(private FiscalYearRepositoryInterface $fiscalYearRepository)
    {
    }

    public function getFiscalYearActiveId()
    {
        return $this->fiscalYearRepository->getFiscalYearActive();
    }

    public function getAllFiscalYears()
    {
        return $this->fiscalYearRepository->getAllFiscalYear();
    }

    public function getActiveFiscalYear()
    {
        return $this->fiscalYearRepository->getActiveFiscalYear();
    }

    public function fiscalYearStore($request)
    {
        $request['active'] = isset($request['active'])?1:0;

        $data_array = [
            'year' => $request['year'],
            'active' => $request['active'],
        ];

        $data = $this->fiscalYearRepository->create( $data_array );
        LogActivity::addToLog('Created Fiscal Year - '. '"'.$data->id.'"');

        if($data->wasRecentlyCreated === true){
            $this->getSuccessMessage('Fiscal Year');
        }
        return $data;
    }

    public function fiscalYearUpdate($request){

        $request['active'] = isset($request['active'])?1:0;

        $data_array = [
            'year' => $request['year'],
            'active' => $request['active'],
        ];

        if($this->fiscalYearRepository->update( $request['id'] , $data_array ) == 1){
            $this->getUpdateSuccessMessage('Fiscal Year');
            LogActivity::addToLog('Updated Fiscal Year - '. '"'.$request['id'].'"');
            return true;
        }
    }

    public function deleteFiscalYear($fiscalYear_id)
    {
        if($this->fiscalYearRepository->destroy($fiscalYear_id)){
            $this->getDestroySuccessMessage('Fiscal Year');
            LogActivity::addToLog('Deleted Fiscal Year - '. '"'.$fiscalYear_id.'"');
            return true;
        }
    }

}
