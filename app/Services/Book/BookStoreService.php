<?php


namespace App\Services\Book;


use Illuminate\Http\Request;
use Modules\Customer\Entities\Address;

class BookStoreService extends BookCommonService
{
    public function store(Request $request)
    {
        $book = $this->repository->store($request->all());
//        $user = auth()->user();
//        $book = $this->repository->store($request->all());
//        $user->addresses()->save($book);
//        dd($user->load('addresses'));
        return $book;
    }
}
