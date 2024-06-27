<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;

class DashboardAdminController extends Controller
{
    protected $tahun;


    public function __construct()
    {
        $this->tahun = TahunAjaran::orderBy('id', 'desc')->first();
    }
    public function listtahun()
    {
        return view('dashboard.admin.listtahun', [
            'user' => 'admin',
            'tahun' => $this->tahun,
            'listtahun' => TahunAjaran::orderBy('id', 'desc')->get()
        ]);
    }
    public function listdosen()
    {
        return view('dashboard.admin.listdosen', [
            'user' => 'admin',
            'tahun' => $this->tahun,
            'listtahun' => Dosen::orderBy('id', 'desc')->get()
        ]);
    }
    public function listmahasiswa()
    {
        return view('dashboard.admin.listmahasiswa', [
            'user' => 'admin',
            'tahun' => $this->tahun,
            'listtahun' => Mahasiswa::orderBy('id', 'desc')->get()
        ]);
    }
}
