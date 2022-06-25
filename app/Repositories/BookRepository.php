<?php

namespace App\Repositories;

use App\Book;
use Illuminate\Database\Eloquent\Builder;

class BookRepository extends BaseRepository
{
    public function model(): string
    {
        return Book::class;
    }

    public function getBaseQuery()
    {
        return $this->model()::query()->with(['reviews', 'authors']);
    }

    public function orderQuery(Builder $query, string $column, string $direction): Builder
    {
        return $query->orderBy($column, $direction);
    }

    public function paginate(int $perPage = 10, array $relations = [])
    {
        $books = $this->model()::query();
        return $this->paginateQuery($books, $perPage);
    }

    public function withAvg(Builder $query, string $relation, string $column): Builder
    {
        return $query->withAvg($relation, $column);
    }

    public function withCount(Builder $query, string $relation): Builder
    {
        return $query->withCount($relation);
    }
}
