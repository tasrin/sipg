<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckRole
{
    public function handle($request, Closure $next, $role)
    {
        $roles = explode('|', $role);
        foreach ($roles as $rolename) {
            if ($request->user()->hasRole($rolename)) {
                return $next($request);
            }
        }
        // return abort(404);
        if (Auth::user()->hasRole('supervisor')) {
            $message = [
                'alert-type' => 'error',
                'message' => 'Maaf, anda tidak punya akses untuk melakukan ini. Anda hanya dapat melihat'
            ];
        }
        else{
            $message = [
                'alert-type' => 'error',
                'message' => 'Maaf, anda tidak punya akses untuk melakukan ini.'
            ];
        }
        return redirect()->back()->with($message);
    }
}
