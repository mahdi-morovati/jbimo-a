<?php


namespace App\Services\Book;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Customer\Entities\Address;

class BookStoreService extends BookCommonService
{
    public function store(Request $request)
    {
       return DB::transaction(function () use ($request) {
            $book = $this->repository->store($request->all());
            $book->authors()->sync($request->authors);
            $book->load('reviews', 'authors');
        }, 3);
    }
}
