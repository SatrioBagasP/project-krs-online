<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KrsOwnerShip
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
        // Ambil dosen yang sedang login
        $dosen = Auth::user();

        // Ambil KRS yang sedang diakses dari routes model binding
        $krs = $request->route('krs');

        // Ambil ID dosen dari KRS yang diakses
        $dosenIdFromKrs = $krs->jadwal->dosen_id;

        // Jika dosen yang sedang login tidak sama dengan dosen yang berhak mengakses KRS
        if ($dosen->id != $dosenIdFromKrs) {
            // Redirect ke halaman lain atau tampilkan pesan error
            return redirect('/home')->with('gagal', 'Anda tidak memiliki izin untuk mengakses data ini.');
        }
        return $next($request);
    }
}
