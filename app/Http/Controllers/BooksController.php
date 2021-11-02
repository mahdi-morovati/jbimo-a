<?php

declare (strict_types=1);

namespace App\Http\Controllers;

use App\Book;
use App\BookReview;
use App\Http\Requests\PostBookRequest;
use App\Http\Requests\PostBookReviewRequest;
use App\Http\Resources\BookResource;
use App\Http\Resources\BookReviewResource;
use App\Services\Book\BookPaginateService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{
    public function getCollection(Request $request, BookPaginateService $bookPaginateService)
    {
        dd(__METHOD__);
        //@todo code here
    }

    public function post(PostBookRequest $request)
    {
        //@todo code here
    }

    public function postReview(Book $book, PostBookReviewRequest $request)
    {
        //@todo code here
    }
}
