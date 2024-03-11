<?php

namespace App\Repository;

use App\Models\Activity;
use App\Repository\Interfaces\ActivityRepositoryInterface;

class ActivityRepository extends BaseRepository implements ActivityRepositoryInterface
{
    public function __construct(Activity $model)
    {
        parent::__construct($model);
    }

    public function getAllActivity($request, $paginator)
    {
        $query = $this->model
            ->with(['admin' => function ($q) {
                $q->select('id', 'name')->withTrashed();
            }])
            ->with('fiscalYear:id,year')
            ->orderBy('created_at', 'desc');

        if (array_key_exists("date_to", $request) and array_key_exists("date_from", $request)) {
            $query->whereBetween('created_at', [$request['date_from'], $request['date_to']]);
        }

        if (array_key_exists("search_term", $request)) {
            $query->where('description', 'LIKE', "%{$request['search_term']}%")
                ->orWhere('ip_address', 'LIKE', "%{$request['search_term']}%")
                ->orWhereHas('admin', function ($q) use ($request) {
                    $q->where('name', 'LIKE', "%{$request['search_term']}%");
                });
        }
        return $query->paginate($paginator);
    }

}
