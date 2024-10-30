<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */
  public function handle(Request $request, Closure $next, $roles): Response
  {
    // dd($request->user(), $role_id);

    if (!$request->user()) {
      return redirect()->route('landing');
      // return dd($request);
    }
    //$asd = $request->user();
    // $asdd = in_array($roles);
    // dd($request->user()->hasRole($roles));
    //dd($roles);
    // dd($asdd);
    // Use Laravel's `hasRole` method for clear and concise role check
    //dd($request->user()->hasRole($roles));
    // if ($request->user()->hasRole('admin')) {
    //   return redirect()->route('dashs');
    //   //abort(403, "You don't have the necessary permissions for this action.");
    // }
    if ($request->user()->hasRole($roles)) {
      return $next($request);
      //abort(403, "You don't have the necessary permissions for this action.");
    }
    //else {
    //   // abort(403, "You don't have the necessary permissions for this action.");
    // }
    return $next($request);
  }
}
