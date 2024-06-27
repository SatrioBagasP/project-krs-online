<?php

namespace App\Http\Middleware;

use App\Models\TahunAjaran;
use Closure;
use Illuminate\Http\Request;

class isStatusOn
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
        $tahunajaran =  TahunAjaran::orderBy('id', 'desc')->first();

        if ($tahunajaran->status_nilai != 1 || $tahunajaran->status_nilai != 1) {
            abort(403);
        }
        return $next($request);
    }
}
