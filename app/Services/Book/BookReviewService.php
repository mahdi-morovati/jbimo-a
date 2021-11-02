<?php


namespace App\Services\Book;


use Illuminate\Http\Request;
use Modules\Customer\Entities\Address;

class BookReviewService extends BookCommonService
{
    public function store(Request $request)
    {
        $book = $this->repository->store($request->all());
        $book->authors()->sync($request->authors);
        $book->load('reviews', 'authors');

        return $book;
    }
}
