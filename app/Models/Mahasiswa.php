<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];

    // protected $with =
    // [
    //     'krs',
    //     'user'
    // ];
    public function krs()
    {
        return $this->hasMany(Krs::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
