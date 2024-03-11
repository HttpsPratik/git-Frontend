<?php

namespace App\Repository;

use App\Models\User;
use App\Repository\Interfaces\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function getAllUser($request)
    {
        $query = $this->model
            ->orderBy('created_at', 'DESC')
            ->when(array_key_exists("search_term", $request), function ($q) use ($request) {
                $q->where('name', 'LIKE', "%{$request['search_term']}%")
                    ->orWhere('email', 'LIKE', "%{$request['search_term']}%");
            });
        return $query->paginate();
    }
}
