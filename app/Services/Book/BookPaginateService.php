<?php


namespace App\Services\Book;


use App\QueryFilters\General\Title;
use Illuminate\Http\Request;

class BookPaginateService extends BookCommonService
{

    public function paginate(Request $request, int $perPage = 10)
    {

        $baseQuery = $this->repository->getBaseQuery();
        $orderQuery = $this->repository->orderQuery($baseQuery, $request->sortColumn, $request->sortDirection);
        $filteredQuery = $this->sendThroughPipeline($orderQuery, [Title::class]);
        return $this->repository->paginateQuery($filteredQuery, $perPage);
    }
}
