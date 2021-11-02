<?php


namespace App\Services\Book;


class BookPaginateService extends BookCommonService
{
    public function customerAddressesPaginate(int $perPage, array $relations = [])
    {
        return $this->repository->paginate($perPage, $relations);
    }

    public function customerAddressesIndex(array $relations = [])
    {
        return $this->repository->all($relations);
    }
}
