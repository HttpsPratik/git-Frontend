<?php


namespace App\Repository;

use App\Exceptions\ErrorPageException;
use App\Repository\Interfaces\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements EloquentRepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        if(!$model){
            throw new ErrorPageException('Model Not Found');
        } else {
            $this->model = $model;
        }
    }

    public function all(array $cols = null)
    {
        try {
            return isset($cols) ? $this->model->all($cols) : $this->model->all();
        } catch(\Exception $ex){
            throw new ErrorPageException('Method => BaseRepository all, msg => '.$ex->getMessage());
        }
    }

    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    public function insertMany(array $attributes){
        return $this->model->insert($attributes);
    }

    public function update($id, array $newupdate)
    {
        if($this->model->where('id', $id)->exists()) {
            return $this->model->where('id',$id)->update($newupdate);
        } else {
            throw new ErrorPageException('Method => BaseRepository update, msg => id not found, Model => '.get_class($this->model));
        }
    }

    public function findById($id)
    {
        if($this->model->where('id', $id)->exists()) {
            return $this->model->find($id);
        } else {
            throw new ErrorPageException('Method => BaseRepository findById, msg => id not found, Model => '.get_class($this->model));
        }
    }

    public function fieldExists($fieldName, $fieldValue)
    {
        return $this->model->where($fieldName, $fieldValue)->exists();
    }

    public function findByName($name, $value)
    {
        if($this->model->where($name, $value)->exists()) {
            return $this->model->where($name, $value);
        } else {
            throw new ErrorPageException('Method => BaseRepository findByName, msg => id not found, Model => '.get_class($this->model));
        }
    }

    public function selectByName($name, $value, array $select)
    {
        if($this->model->where($name, $value)->exists()) {
            return $this->model->select($select)->where($name, $value);
        } else {
            throw new ErrorPageException('Method => BaseRepository selectByName, msg => id not found, Model => '.get_class($this->model));
        }
    }

    public function destroy($id)
    {
        if($this->model->where('id', $id)->exists()) {
            return $this->model->find($id)->delete();
        } else {
            throw new ErrorPageException('Method => BaseRepository destroy, msg => id not found, Model => '.get_class($this->model));
        }
    }

    public function forceDestroy($id){
        if($this->model->onlyTrashed()->where('id', $id)->exists()) {
            return $this->model->onlyTrashed()->find($id)->forceDelete();
        } else {
            throw new ErrorPageException('Method => BaseRepository forceDestroy, msg => id not found, Model => '.get_class($this->model));
        }
    }

    public function deleted(array $relations = []){
        try {
            return $this->model
                ->with($relations)
                ->onlyTrashed();
        } catch(\Exception $ex){
            throw new ErrorPageException('Method => BaseRepository deleted, msg => '.$ex->getMessage());
        }
    }

    public function undelete($id){

        if($this->model->onlyTrashed()->where('id', $id)->exists()){
            return $this->model->onlyTrashed()->where('id', $id)->restore();
        } else throw new ErrorPageException('Method => BaseRepository undelete, msg => id not found, Model => '.get_class($this->model));
    }
}
