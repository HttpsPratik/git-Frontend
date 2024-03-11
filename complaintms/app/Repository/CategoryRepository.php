<?php

namespace App\Repository;

use App\Models\Category;
use App\Repository\Interfaces\CategoryRepositoryInterface;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    public function getCategoryName()
    {
        return $this->model
            ->select('id', 'name')
            ->get();
    }

}
