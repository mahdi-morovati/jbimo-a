<?php


namespace App\Services\Book;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookStoreService extends BookCommonService
{
    public function store(Request $request)
    {
       return DB::transaction(function () use ($request) {
            $book = $this->repository->store($request->all());
            $book->authors()->sync($request->authors);
            $book->load('reviews', 'authors');
            return $book;
        }, 3);
    }
}
