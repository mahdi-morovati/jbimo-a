<?php

namespace App\QueryFilters\General;

use Illuminate\Database\Eloquent\Builder;

class SortColumn extends Filter
{
    protected function applyFilter(Builder $builder): Builder
    {
        return $builder->orderBy(request($this->filterName()), request()->input('sort_direction', 'asc'));
    }
}
