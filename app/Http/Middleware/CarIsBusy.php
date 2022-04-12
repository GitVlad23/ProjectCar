<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CarIsBusy
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = User::class;
        $user = auth('web')->user()->is_driving;

        if($user == 1)
        {
            session()->flash('warning', 'You are driving right now!');
            return redirect()->back();
        }

        return $next($request);
    }
}
