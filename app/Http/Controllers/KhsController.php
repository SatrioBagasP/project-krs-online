<?php

namespace App\Http\Controllers;

use App\Models\Krs;
use App\Models\User;
use App\Models\Jadwal;
use App\Models\Matkul;
use App\Models\Mahasiswa;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;


class KhsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $tahun;

    public function __construct()
    {
        $this->tahun = TahunAjaran::orderBy('id', 'desc')->first();
        // $this->user = Dosen::where('user_id', auth()->user()->id)->first();
    }

    public function index(User $user)
    {
        $user = Mahasiswa::where('user_id', auth()->user()->id)->first();

        //Memunculkan jadwal kelas berdasarkan ganjil
        if ($this->tahun->id % 2 == 1) {
            $jadwal = Jadwal::whereIn('matkul_id', Matkul::whereRaw('semester %2 = 1')->pluck('id'))->latest()->with(['dosen', 'matkul'])->get();
        } else {
            $jadwal = Jadwal::whereIn('matkul_id', Matkul::whereRaw('semester %2 = 0')->pluck('id'))->latest()->with(['dosen', 'matkul'])->get();
        }

        return view('dashboard.mahasiswa.krs', [
            // 'totalsks' => $totalSKS,
            'tahun' => $this->tahun,
            'user' => $user->nama_mahasiswa,
            'jadwal' => $jadwal,
            'khs' => Krs::where('mahasiswa_id', $user->id)
                ->where('tahun_ajaran_id', $this->tahun->id)
                ->with(['jadwal.matkul', 'jadwal.dosen', 'tahun_ajaran'])
                ->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mahasiswa_id = Mahasiswa::where('user_id', auth()->user()->id)->first()->id;

        $messages = [
            'jadwal_id.required' => 'Jadwal Tidak Boleh Kosong'
        ];

        $validated = $request->validate([
            'jadwal_id' => 'required'
        ], $messages);


        // Tambahkan mahasiswa_id dan tahun_ajaran ke array hasil validasi
        $validated['mahasiswa_id'] = $mahasiswa_id;
        $validated['tahun_ajaran_id'] = $this->tahun->id;


        // Cek apakah sudah mengambil kelas yang sama tetapi beda kode jadwal

        //Ambil kode matkul yang dipilih
        $kodematkul = Jadwal::where('id', $validated['jadwal_id'])->with(['matkul'])->first()->matkul->kode_matkul;

        //ambil kode matkul apa saja yang sudah diambil di table krs
        $cek = Krs::where('mahasiswa_id', $mahasiswa_id)
            ->where('tahun_ajaran_id', $this->tahun->id)
            ->with(['jadwal.matkul'])
            ->get();

        //Melakukan pengecekan jika matkul yang dipilih sudah ada pada table krs maka tolak
        foreach ($cek as $data) {
            if ($kodematkul == $data->jadwal->matkul->kode_matkul) {
                return redirect('/khs')->with('gagal', 'Anda sudah mengambil kelas ini!');
            }
        }

        //Jika lulus semua pengecekan, langsung setor
        Krs::create($validated);
        return redirect('/khs')->with('datachange', 'Kelas berhasil di simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Krs  $krs
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $user = Mahasiswa::where('user_id', auth()->user()->id)->first();

        if ($request->isMethod('post')) {
            $khs = Krs::where('mahasiswa_id', $user->id)
                ->where('tahun_ajaran_id', request()->tahun)
                ->with(['jadwal.matkul', 'jadwal.dosen', 'tahun_ajaran'])
                ->get();
        } else {
            $khs = Krs::where('mahasiswa_id', $user->id)
                ->where('tahun_ajaran_id', $this->tahun->id)
                ->with(['jadwal.matkul', 'jadwal.dosen', 'tahun_ajaran'])
                ->get();
        }

        //Ambil ID Tahun brp saja di KRS Mahasiswa
        $id = $khs->pluck('tahun_ajaran_id')->unique();

        return view('dashboard.mahasiswa.khs', [
            'tahun' => $this->tahun,
            'user' => $user->nama_mahasiswa,
            'khstahun' => TahunAjaran::whereIn('id', $id)
                ->orderBy('id', 'desc')
                ->get(),
            'khs' => $khs
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\krs  $krs
     * @return \Illuminate\Http\Response
     */
    public function edit(Krs $krs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\krs  $krs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, krs $krs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\krs  $krs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Krs $krs)
    {
        Krs::destroy($krs->id);
        return redirect('/khs')->with('datachange', 'Kelas telah Dihapus');
    }
}
