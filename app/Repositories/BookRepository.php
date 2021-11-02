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

}
