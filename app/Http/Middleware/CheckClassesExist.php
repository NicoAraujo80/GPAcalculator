<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class CheckClassesExist
{
    /**
     * Checks whether or not there is a cookie of your classes
     * If there is none it will redirect you to an index view where you can choose your classes
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $classes = Session::get('classes', null);
        $classesExist = isset($classes);
        if ($classesExist) {
            return $next($request);
        }

        return redirect()->route('chooseClasses');
    }
}
