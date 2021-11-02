<?php


namespace App\Repositories;


abstract class BaseRepository
{

    /**
     * @var \Illuminate\Contracts\Foundation\Application|mixed
     */
    protected $model;

    public function __construct()
    {
        $this->model = app($this->model());
    }

    abstract public function model();

    /**
     * @param array $relations
     * @return mixed
     */
    public function all(array $relations = [])
    {
        if (!$relations) return $this->model->latest()->get();
        return $this->model->latest()->with($relations)->get();
    }

    public function allWithCount(array $counts, $relations = [])
    {
        if (!$relations) return $this->model->withCount($counts)->latest()->get();
        return $this->model->withCount($counts)->latest()->with($relations)->get();
    }

    /**
     * @param int $perPage
     * @param array $relations
     * @return mixed
     */
    public function paginate(int $perPage, array $relations = [])
    {
        if (!$relations) return $this->model->latest()->paginate((integer)$perPage);
        return $this->model->latest()->with($relations)->paginate((integer)$perPage);
    }

    public function paginateWithCount(array $counts, int $perPage = 15, array $relations = [])
    {
        if (!$relations) return $this->model->withCount($counts)->latest()->paginate((integer)$perPage);
        return $this->model->with($relations)->withCount($counts)->latest()->paginate((integer)$perPage);
    }

    public function paginateQuery($query, $perPage)
    {
        if ($perPage) {
            return $query->paginate((int)$perPage);
        }

        return $query->get();
    }

    public function getByLimit($col, $value, $limit = 15)
    {
        return $this->model->where($col, $value)->latest()->limit($limit)->get();
    }

    public function getBy($col, $value)
    {
        return $this->model->where($col, $value)->latest()->get();
    }

    public function firstBy($col, $value)
    {
        return $this->model->where($col, $value)->first();
    }

    public function firstByOrFail($col, $value)
    {
        return $this->model->where($col, $value)->firstOrFail();
    }

    public function whereIn(string $col, array $value)
    {
        return $this->model->whereIn($col, $value)->get();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function findModel(string $model, int $id)
    {
        return $model::query()->find($id);
    }

    public function store($requestAll)
    {
        return $this->model->create($requestAll);
    }

    public function update($requestAll, $model)
    {
        $model->update($requestAll);
        return $model;
    }

    public function delete($model)
    {
        return $model->delete();
    }

    public function exists($id)
    {
        return $this->model->where('id', $id)->exists();
    }

}
