<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Krs extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    // protected $with =
    // [
    //     'jadwal',
    //     'mahasiswa'
    // ];
    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
    public function tahun_ajaran()
    {
        return $this->belongsTo(TahunAjaran::class);
    }
}
