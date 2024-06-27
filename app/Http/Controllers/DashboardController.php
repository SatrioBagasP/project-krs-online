<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Jadwal;
use App\Models\Mahasiswa;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $tahun;
    protected $user;

    public function __construct()
    {
        $this->tahun = TahunAjaran::orderBy('id', 'desc')->first();
        // $this->user = Dosen::where('user_id', auth()->user()->id)->first();
    }
    public function index()
    {
        if (auth()->user()->role == 1) {
            $user = Mahasiswa::where('user_id', auth()->user()->id)->first()->nama_mahasiswa;
        }
        if (auth()->user()->role == 2) {
            $user = Dosen::where('user_id', auth()->user()->id)->first()->nama_dosen;
        }
        if (auth()->user()->role == 3) {
            $user = 'admin';
        }
        return view('dashboard.index', [
            'tahun' => $this->tahun,
            'user' => $user
        ]);
    }
    public function profile()
    {
        if (auth()->user()->role == 1) {
            $user = Mahasiswa::where('user_id', auth()->user()->id)->first()->nama_mahasiswa;
        }
        if (auth()->user()->role == 2) {
            $user = Dosen::where('user_id', auth()->user()->id)->first()->nama_dosen;
        }
        return view('dashboard.profile', [
            'tahun' => $this->tahun,
            'user' => $user
        ]);
    }

    public function riwayat()
    {
        if (auth()->user()->role == 1) {
            $user = Mahasiswa::where('user_id', auth()->user()->id)->first()->nama_mahasiswa;
        }
        if (auth()->user()->role == 2) {
            $user = Dosen::where('user_id', auth()->user()->id)->first()->nama_dosen;
        }
        return view('dashboard.mahasiswa.riwayat', [
            'tahun' => $this->tahun,
            'user' => $user
        ]);
    }
}
