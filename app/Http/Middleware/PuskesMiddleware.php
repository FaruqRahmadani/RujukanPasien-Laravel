<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class PuskesMiddleware
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
    $Auth = Auth::User();
    if (($Auth->tipe == 1) || ($Auth->tipe == 2)) {
      return $next($request);
    }
    return abort(404);
  }
}
