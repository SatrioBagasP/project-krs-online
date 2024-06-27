<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];

    // protected $with =
    // [
    //     'krs',
    //     'matkul',
    //     'dosen',
    // ];

    public function krs()
    {
        return $this->hasMany(Krs::class);
    }

    public function matkul()
    {
        return $this->belongsTo(Matkul::class);
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }
}
