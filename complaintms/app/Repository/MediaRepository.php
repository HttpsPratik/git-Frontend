<?php

namespace App\Repository;

use App\Models\Medium;
use App\Repository\Interfaces\MediaRepositoryInterface;

class MediaRepository extends BaseRepository implements MediaRepositoryInterface
{
    public function __construct(Medium $model)
    {
        parent::__construct($model);
    }

    public function getMediaCount($fiscal_year_id = null)
    {
        return $this->model
            ->select('id', 'name')
            ->withCount(['tickets' => function ($q) use ($fiscal_year_id) {
                $q->when(!$fiscal_year_id, function ($q) {
                    $q->whereHas('fiscalYear', function ($q) {
                        $q->where('active', 1);
                    });
                })
                    ->when($fiscal_year_id, function ($q) use ($fiscal_year_id) {
                        $q->whereHas('fiscalYear', function ($q) use ($fiscal_year_id) {
                            $q->where('id', $fiscal_year_id);
                        });
                    });
            }])
            ->get();
    }

    public function getMediumId($name){
        return $this->model->where('name',$name)->first()->id;
    }


}
