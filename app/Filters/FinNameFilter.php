<?php

namespace App\Filters;

use Closure;

class FinNameFilter
{
    public function handle($request, $next)
    {
        $builder = $next($request);
        if (request()->filled('sender_fin')) {
            $builder->where('sender_fin', 'like', '%' . request('sender_fin') . '%');
        }
        return $builder;
    }
}
