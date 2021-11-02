<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Repositories\BaseRepository;
use Illuminate\Pipeline\Pipeline;


class BaseService extends Controller
{
    public BaseRepository $repository;

    /**
     * @param int $perPage
     * @param array $relations
     * @return mixed
     */
    public function paginate(int $perPage, array $relations = [])
    {
        if (!$perPage) {
            return $this->repository->all($relations);
        } else {
            return $this->repository->paginate($perPage, $relations);
        }
    }

    public function sendThroughPipeline($payload, array $tasks)
    {
        return app(Pipeline::class)
            ->send($payload)
            ->through($tasks)
            ->thenReturn();
    }


}
