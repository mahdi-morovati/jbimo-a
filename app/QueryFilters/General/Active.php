<?php


namespace App\QueryFilters\General;


class Active extends Filter
{


    protected function applyFilter($builder)
    {
        return $builder->where('active',  filter_var(request($this->filterName()), FILTER_VALIDATE_BOOL));
    }
}
