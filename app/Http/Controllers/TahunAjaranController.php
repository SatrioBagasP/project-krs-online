<?php

namespace App\Http\Controllers;

use App\Models\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;


class TahunAjaranController extends Controller
{
    protected $tahun;
    public function __construct()
    {
        $this->tahun = TahunAjaran::orderBy('id', 'desc')->first();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
        $validated = $request->validate([
            'kode_tahun' => 'required|numeric',
            'tahun_ajaran' => 'required'
        ]);

        $validated['status_krs'] = 0;
        $validated['status_nilai'] = 0;

        TahunAjaran::create($validated);
        return redirect('/admin/listtahun')->with('datachange', 'Tahun Ajaran baru berhasil di simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('dashboard.admin.listtahunedit', [
            'user' => 'admin',
            'tahun' => $this->tahun,
            'tahunedit' => TahunAjaran::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TahunAjaran $tahun)
    {
        //
        $validated = $request->validate([
            'kode_tahun' => 'required|numeric',
            'tahun_ajaran' => 'required',
            'status_krs' => 'required|boolean',
            'status_nilai' => 'required|boolean',
        ]);
        TahunAjaran::where('id', $tahun->id)
            ->update($validated);
        return redirect('/admin/listtahun')->with('datachange', 'Tahun ajaran berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            TahunAjaran::find($id)->deleteorFail();
        } catch (QueryException $e) {
            return  redirect('/admin/listtahun')->with('gagal', 'Terjadi kesalahan saat mencoba menghapus Tahun Ajaran.');
        }

        return redirect('/admin/listtahun')->with('datachange', 'Tahun Ajaran telah Dihapus');
    }
}
