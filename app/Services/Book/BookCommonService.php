<?php


namespace App\Services\Book;


use App\Repositories\BaseRepository;
use App\Repositories\BookRepository;
use App\Services\BaseService;

class BookCommonService extends BaseService
{
    public BaseRepository $repository;

    public function __construct(BookRepository $repository)
    {
        $this->repository = $repository;
    }
}
