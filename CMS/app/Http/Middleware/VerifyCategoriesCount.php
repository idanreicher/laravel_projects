<?php

namespace App\Http\Middleware;

use Closure;
use App\Category;

class VerifyCategoriesCount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        session()->flash('error' , 'Please add a category in order to create a post');

        if (Category::all()->count() == 0) {
            return redirect(route('categories.create'));
        }
        return $next($request);
    }
}
