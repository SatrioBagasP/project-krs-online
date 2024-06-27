<?php

namespace App\Http\Controllers;

use App\Models\Krs;
use App\Models\Dosen;
use App\Models\Jadwal;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Models\TahunAjaran;

class DashboardDosenController extends Controller
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
        return view('dashboard.dosen.kelas', [
            'tahun' => $this->tahun,
            'user' => Dosen::where('user_id', auth()->user()->id)->first()->nama_dosen,
            'kelas' => Jadwal::with(['matkul', 'krs', 'dosen'])
                ->where('dosen_id', Dosen::where('user_id', auth()->user()->id)->first()->id)
                ->where('tahun_ajaran_id', $this->tahun->id)
                ->get(),
        ]);
    }
    public function detail(Jadwal $jadwal)
    {
        // $krs = $jadwal->krs()->with('mahasiswa')->orderBy('mahasiswa_id')->paginate(5);
        // $krs = Krs::where('jadwal_id', $jadwal->id)->with(['mahasiswa'])->orderBy('mahasiswa_id')->paginate(5);

        return view('dashboard.dosen.detail', [
            'tahun' => $this->tahun,
            'user' => Dosen::where('user_id', auth()->user()->id)->first()->nama_dosen,
            'jadwal' => $jadwal->load(['matkul']),
            'krs' => $jadwal->krs()->with('mahasiswa')->orderBy('mahasiswa_id')->where('tahun_ajaran_id', $this->tahun->id)->paginate(5)
        ]);
    }
    public function edit(Krs $krs)
    {
        return view('dashboard.dosen.nilai', [
            'tahun' => $this->tahun,
            'user' => Dosen::where('user_id', auth()->user()->id)->first()->nama_dosen,
            'krs' => $krs,
        ]);
    }

    public function store(Request $request, Krs $krs)
    {
        $messages = [
            'UTS.required' => 'Nilai UTS wajib diisi.',
            'UTS.numeric' => 'Nilai UTS harus berupa angka.',
            'UTS.max' => 'Nilai UTS maksimal 100.',
            'UAS.required' => 'Nilai UAS wajib diisi.',
            'UAS.numeric' => 'Nilai UAS harus berupa angka.',
            'UAS.max' => 'Nilai UAS maksimal 100.',
        ];
        $validated = $request->validate([
            'UTS' => 'required|numeric|max:100',
            'UAS' => 'required|numeric|max:100'
        ], $messages);

        Krs::where('id', $krs->id)
            ->update($validated);
        return redirect('/dosen/detail/' . $krs->jadwal->kode_jadwal)->with('datachange', 'Nilai berhasil di Upload');
    }
}
