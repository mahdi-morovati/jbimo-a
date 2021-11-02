<?php


namespace App\Services\Book;


use App\Book;
use Illuminate\Http\Request;

class BookUpdateService extends BookCommonService
{
    public function update(Request $request, Book $book)
    {
        $this->repository->update($request->all(), $book);
        return $book;
    }
}
