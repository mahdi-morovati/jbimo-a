<?php


namespace App\Services\Book;



use App\Book;

class BookDestroyService extends BookCommonService
{
    public function destroy(Book $book)
    {
        return $this->repository->delete($book);
    }
}
