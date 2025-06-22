<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
  public function handle(Request $request, Closure $next, ...$roles)
  {
    // Redirect to login if user is not authenticated
    if (!Auth::check()) {
      return redirect()->route('login');
    }

    // If the user doesn't have the right role, abort with 403
    if (!in_array(Auth::user()->role, $roles)) {
      abort(403, 'Unauthorized action');
    }

    return $next($request);
  }
}
