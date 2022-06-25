<?php


namespace App\Services\BookReview;


use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookReviewStoreService extends BookReviewCommonService
{
    public function store(Book $book, Request $request)
    {
        $data = $request->all();
        $data['user_id'] = $this->getLoggedInUserId();
       return DB::transaction(function () use ($book, $data) {
            return $this->repository->storeBookReview($book, $data);
        }, 3);
    }
}
