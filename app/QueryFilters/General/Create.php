<?php


namespace App\QueryFilters\General;


class Create extends Filter
{


    protected function applyFilter($builder)
    {
        return $builder->orderBy('created_at', request($this->filterName()));
    }
}
