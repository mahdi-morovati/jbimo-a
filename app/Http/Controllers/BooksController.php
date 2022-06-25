<?php

declare (strict_types=1);

namespace App\Http\Controllers;

use App\Book;
use App\Http\Requests\PostBookRequest;
use App\Http\Requests\PostBookReviewRequest;
use App\Http\Resources\BookResource;
use App\Http\Resources\BookReviewResource;
use App\Services\Book\BookPaginateService;
use App\Services\Book\BookStoreService;
use App\Services\BookReview\BookReviewStoreService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class BooksController extends Controller
{
    const PAGINATE_PER_PAGE = 15;

    public function getCollection(Request $request, BookPaginateService $bookPaginateService): AnonymousResourceCollection
    {
        if ($request->page) return BookResource::collection($bookPaginateService->paginate($request, self::PAGINATE_PER_PAGE));
        return BookResource::collection($bookPaginateService->paginate($request));
    }

    public function post(PostBookRequest $request, BookStoreService $bookStoreService): BookResource
    {
        return new BookResource($bookStoreService->store($request));
    }

    public function postReview(Book $book, PostBookReviewRequest $request, BookReviewStoreService $bookReviewService): BookReviewResource
    {
        return new BookReviewResource($bookReviewService->store($book, $request));
    }
}
