<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dosen;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class DosenController extends Controller
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

        //Membuat user baru
        User::create([
            'email' => $request->email,
            'password' => bcrypt('123'),
            'role' => 2
        ]);

        //Ambil user id berdasarkan email
        $user = User::where('email', $request->email)->first();

        //
        $validated = $request->validate([
            'nip' => 'required|unique:dosens,nip|numeric',
            'nama_dosen' => 'required'
        ]);

        //menambahkan user id pada validated
        $validated['user_id'] = $user->id;

        Dosen::create($validated);
        return redirect('/admin/listdosen')->with('datachange', 'Dosen baru berhasil di simpan');
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
        return view('dashboard.admin.listdosenedit', [
            'user' => 'admin',
            'tahun' => $this->tahun,
            'dosen' => Dosen::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validated = $request->validate([
            'nip' => 'required|numeric',
            'nama_dosen' => 'required',
        ]);
        Dosen::where('id', $id)
            ->update($validated);
        return redirect('/admin/listdosen')->with('datachange', 'Dosen berhasil diupdate');
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
            $dosen = Dosen::find($id);
            $email =  $dosen->user->email;

            $dosen->delete();

            return User::where('email', $email)->delete();
        } catch (QueryException $e) {
            return  redirect('/admin/listdosen')->with('gagal', 'Terjadi kesalahan saat mencoba menghapus dosen.');
        }

        return redirect('/admin/listdosen')->with('datachange', 'dosen telah Dihapus');
    }
}
