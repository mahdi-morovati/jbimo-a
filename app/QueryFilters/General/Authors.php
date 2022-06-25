<?php


namespace App\QueryFilters\General;


use Illuminate\Database\Eloquent\Builder;

class Authors extends Filter
{
    protected function applyFilter(Builder $builder): Builder
    {
        $authorsId = explode(',', \request($this->filterName())); // @todo fix with decorator
        return $builder->whereHas('authors', function ($query) use ($authorsId) {
            $query->whereIn('id', $authorsId);
        });
    }
}
