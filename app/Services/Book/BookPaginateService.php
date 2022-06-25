<?php


namespace App\Services\Book;


use App\QueryFilters\General\Authors;
use App\QueryFilters\General\SortColumn;
use App\QueryFilters\General\Title;
use Illuminate\Http\Request;

class BookPaginateService extends BookCommonService
{

    public function paginate(Request $request, int $perPage = null)
    {

        $baseQuery = $this->repository->getBaseQuery();
        $baseQuery = $this->repository->withAvg($baseQuery, 'reviews', 'review');
        $baseQuery = $this->repository->withCount($baseQuery, 'reviews');
        if (isset($request->sortColumn) && isset($request->sortDirection)) {
            $baseQuery = $this->repository->orderQuery($baseQuery, $request->sortColumn, $request->sortDirection);
        }
        $baseQuery = $this->sendThroughPipeline($baseQuery, [Title::class, Authors::class, SortColumn::class]);
        return $this->repository->paginateQuery($baseQuery, $perPage);
    }
}
