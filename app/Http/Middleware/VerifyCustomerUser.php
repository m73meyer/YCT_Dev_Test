<?php

namespace App\Http\Middleware;

use App\Models\Customer;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifyCustomerUser
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
        if ($request['idCustomer']) {
            if (Customer::where('id', '=', $request['idCustomer'])->where('user_id', '=', Auth::user()->id)->count() > 0) {
                return $next($request);
            } else {
                return response('Forbidden', 403);
            }
        }
        return $next($request);
    }
}
