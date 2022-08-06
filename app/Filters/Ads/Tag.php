<?php

namespace App\Filters\Ads;
use App\Filters\Filter;
use Closure;
class Tag extends Filter
{
    protected function applyFilter($builder)
    {
       return $builder->filterSearch("tag" , request($this->filterName()));
    }
}
