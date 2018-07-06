<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AuthMiddleware
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
    $Auth = Auth::user();
    if ($Auth) {
      return $next($request);
    }
    return redirect(Route('LoginForm'));
  }
}
