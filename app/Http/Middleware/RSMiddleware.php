<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RSMiddleware
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
    if ($Auth->tipe == 3) {
      return $next($request);
    }
    return abort(404);
  }
}
