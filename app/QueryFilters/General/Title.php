<?php


namespace App\QueryFilters\General;


use Illuminate\Database\Eloquent\Builder;

class Title extends Filter
{
    protected function applyFilter(Builder $builder): Builder
    {
        return $builder->where('title', 'like', '%' . request($this->filterName()) . '%');
    }
}
