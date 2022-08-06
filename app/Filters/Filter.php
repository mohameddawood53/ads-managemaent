<?php

namespace App\Filters;
use Closure;
use Illuminate\Support\Str;

abstract class Filter
{
    public function handle($request, Closure $next)
    {
        $builder = $next($request);
        if (!request()->has($this->filterName()))
        {
            return $builder;
        }
        return $this->applyFilter($builder);
    }

    protected abstract function applyFilter($builder);

    protected function filterName(){
        return Str::snake(class_basename($this));
    }
}
