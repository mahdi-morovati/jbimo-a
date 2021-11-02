<?php

namespace App\Repositories;

use App\Book;
use Illuminate\Http\Request;

class BookRepository extends BaseRepository
{
    public function model()
    {
        return Book::class;
    }

    public function getBaseQuery()
    {
        return $this->model()::query();
    }

    public function orderQuery($query, string $column, string $direction)
    {
        return $query->orderBy($column, $direction);
    }

    public function paginate(int $perPage = 10, array $relations = [])
    {
        $books = $this->model()::query();
        return $this->paginateQuery($books, $perPage);
        return;
    }
}
