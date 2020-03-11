<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
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
        $user = \Auth::user();
        if ($user && ($user->is_admin || $request->fullUrl() == route('user.edit', $user) || $request->fullUrl() == route('user.update', $user))) {
            return $next($request);
        }

        return redirect('401');
    }
}
