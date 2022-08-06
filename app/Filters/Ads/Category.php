<?php

namespace App\Filters\Ads;
use App\Filters\Filter;
use Closure;
class Category extends Filter
{
    protected function applyFilter($builder)
    {
       return $builder->filterSearch("category" , request($this->filterName()));
    }
}
