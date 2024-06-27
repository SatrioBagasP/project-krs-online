<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class krs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('krs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jadwal_id')->constrained('jadwals');
            $table->foreignId('tahun_ajaran_id')->constrained('tahun_ajarans');
            $table->foreignId('mahasiswa_id')->constrained('mahasiswas');
            $table->integer('UTS')->nullable();
            $table->integer('UAS')->nullable();
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
        Schema::dropIfExists('krs');
    }
}
