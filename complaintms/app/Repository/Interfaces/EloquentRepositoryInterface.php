<?php

namespace App\Repository\Interfaces;

interface EloquentRepositoryInterface
{

    public function all(array $cols = null);

    public function create(array $attributes);

    public function insertMany(array $attributes);

    public function update($id, array $newupdate);

    public function findById($id);

    public function findByName($name , $value);

    public function fieldExists($fieldName, $fieldValue);

    public function selectByName($name, $value, array $select);

    public function destroy($id);

    public function forceDestroy($id);

    public function deleted(array $relations);

    public function undelete($id);
}
