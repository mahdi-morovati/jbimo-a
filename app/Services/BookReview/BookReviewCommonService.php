<?php


namespace App\Services\BookReview;


use App\Repositories\BaseRepository;
use App\Repositories\BookReviewRepository;
use App\Services\BaseService;
use Illuminate\Contracts\Auth\Authenticatable;

class BookReviewCommonService extends BaseService
{
    public BaseRepository $repository;

    public function __construct(BookReviewRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getLoggedInUser(): ?Authenticatable
    {
        return auth()->user();
    }

    public function getLoggedInUserId()
    {
        return auth()->id();
    }
}
