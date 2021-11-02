<?php


namespace App\Services\Book;



use App\Book;

class BookDisplayService extends BookCommonService
{
    public function show(Book $book)
    {
        return $book;
    }
}
