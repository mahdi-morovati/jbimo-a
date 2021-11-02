<?php


namespace App\Services\Book;


use App\QueryFilters\General\Title;
use Illuminate\Http\Request;

class BookPaginateService extends BookCommonService
{

    public function paginate(Request $request, int $perPage = null)
    {

        $baseQuery = $this->repository->getBaseQuery();
//        dd($baseQuery->get()->toArray(), __METHOD__);
        if (isset($request->sortColumn) && isset($request->sortDirection)) {
            $orderQuery = $this->repository->orderQuery($baseQuery, $request->sortColumn, $request->sortDirection);
            $filteredQuery = $this->sendThroughPipeline($orderQuery, [Title::class]);
        }
        $filteredQuery = $this->sendThroughPipeline($baseQuery, [Title::class]);
        return $this->repository->paginateQuery($filteredQuery, $perPage);
    }
}
