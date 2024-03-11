<?php

namespace App\Service;

use App\Facade\LogActivity;
use App\Repository\Interfaces\CategoryRepositoryInterface;
use App\Traits\SuccessMessage;
use Illuminate\Support\Str;

class CategoryService
{
    use SuccessMessage;
    public function __construct(private CategoryRepositoryInterface $categoryRepository)
    { }

    public function getAllCategory()
    {
        return $this->categoryRepository->all();
    }

    public function getCategoryName()
    {
        return $this->categoryRepository->getCategoryName();
    }

    public function getCategoryCount(){
        return $this->categoryRepository->getCategoryCount();
    }

    public function categoryStore($request)
    {
        $data_array = [
            'name'=> preg_replace('/[\s$@_*]+/', ' ', Str::title($request['name'])),
        ];

        $data = $this->categoryRepository->create($data_array);
        LogActivity::addToLog('Created Category - '. '"'.$data->id.'"');
        $this->getSuccessMessage('Category');
        return $data;

        /*if($res->wasRecentlyCreated === true){
            LogActivity::addToLog('Added Fiscal Year - '. $data->year.' '. '"'.$data->id.'"');
            $this->getSuccessMessage('Category');
            return true;
        }*/

    }

    public function categoryUpdate($request)
    {
        $data_array = [
            'name'=> preg_replace('/[\s$@_*]+/', ' ', Str::title($request['name'])),
        ];

        $data = $this->categoryRepository->update( $request['id'] , $data_array );
        LogActivity::addToLog('Updated Category - '. '"'.$request['id'].'"');
        $this->getUpdateSuccessMessage('Category');
        return $data;

        /*if($this->categoryRepository->update( $request['id'] , $data_array ) == 1){
            $this->getUpdateSuccessMessage('Category');
            return true;
        }*/
    }

    public function categoryDelete($category_id)
    {
        if($this->categoryRepository->destroy($category_id) === true){
            LogActivity::addToLog('Deleted Fiscal Year - '. '"'.$category_id.'"');
            $this->getDestroySuccessMessage('Category');
            return true;
        }
    }

}
