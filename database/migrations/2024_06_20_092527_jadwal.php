<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class jadwal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            $table->string('kode_jadwal')->unique();
            $table->foreignId('matkul_id')->constrained('matkuls');
            $table->foreignId('tahun_ajaran_id')->constrained('tahun_ajarans');
            $table->foreignId('dosen_id')->constrained('dosens');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
