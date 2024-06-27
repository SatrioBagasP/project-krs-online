<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalOwnerShip
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

        // Ambil Jadwal yang sedang diakses dari routes model binding
        $jadwal = $request->route('jadwal');

        // Ambil ID dosen dari Jadwal yang diakses
        $dosenIdFromJadwal = $jadwal->dosen_id;

        // Jika dosen yang sedang login tidak sama dengan dosen yang berhak mengakses KRS
        if ($dosen->id != $dosenIdFromJadwal) {
            // Redirect ke halaman lain atau tampilkan pesan error
            return redirect('/home')->with('gagal', 'Anda tidak memiliki izin untuk mengakses data ini.');
        }
        return $next($request);
    }
}
