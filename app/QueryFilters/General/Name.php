<?php


namespace App\QueryFilters\General;


class Name extends Filter
{


    protected function applyFilter($builder)
    {
        return $builder->orderBy('name', request($this->filterName()));
    }
}
