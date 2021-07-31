<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->has('reg') && $request->has('uname')){
             $user= User::where('name', $request->get('uname'))->first();
             if(isset($user) && $user!=null){
                 return redirect()->back()->with('error', 'Username already taken!');
             }
         }
        return $next($request);
    }
}
