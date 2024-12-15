<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Http;
use Closure;
use Illuminate\Http\Request;
use App\IPWhitelist;
use Auth;

class CheckIPWhitelist
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
        $ip =  Http::get('https://api64.ipify.org')->body();
        //dd($ip);
        # Check if IP exists in the whitelist
        $allowed = IPWhitelist::where('ip_address', $ip)->exists();
        if (Auth::user()->roles->contains('title', 'Admin')) {

        }else{
            if (!$allowed) {
                # IP not in whitelist, deny access
                abort(403, 'Unauthorized: Your IP address is not allowed.');
            }
        }

        return $next($request);
    }
}
