<?php

namespace Database\Seeders;

use App\Models\Krs;
use App\Models\User;
use App\Models\Dosen;
use App\Models\Jadwal;
use App\Models\Matkul;
use App\Models\Mahasiswa;
use App\Models\TahunAjaran;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'email' => 'budanis@gmail.com',
            'password' => bcrypt('123'),
            'role' => 2
        ]);
        User::create([
            'email' => 'satrio@gmail.com',
            'password' => bcrypt('123'),
            'role' => 1
        ]);
        User::create([
            'email' => 'yanto@gmail.com',
            'password' => bcrypt('123'),
            'role' => 2
        ]);
        User::create([
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123'),
            'role' => 3
        ]);
        for ($i = 5; $i <= 100; $i++) {
            User::create([
                'email' => 'dummy' . $i . '@gmail.com',
                'password' => bcrypt('123'),
                'role' => 1
            ]);
        }

        Dosen::create([
            'user_id' => 1,
            'nip' => '232301',
            'nama_dosen' => 'Budanis'
        ]);
        Dosen::create([
            'user_id' => 3,
            'nip' => '232302',
            'nama_dosen' => 'Yanto'
        ]);


        Mahasiswa::create([
            'user_id' => 2,
            'npm' => '131301',
            'nama_mahasiswa' => 'Satrio'
        ]);

        for ($i = 4; $i <= 100; $i++) {
            Mahasiswa::create([
                'user_id' => $i,
                'npm' => '13130' . $i,
                'nama_mahasiswa' => 'Dummy' . $i
            ]);
        }
        Matkul::create([
            'kode_matkul' => 'mtk',
            'nama_matkul' => 'Matematika',
            'semester' => 1,
            'sks' => 2

        ]);
        Matkul::create([
            'kode_matkul' => 'alog',
            'nama_matkul' => 'Alogaritma',
            'semester' => 1,
            'sks' => 3
        ]);
        Matkul::create([
            'kode_matkul' => 'bsd',
            'nama_matkul' => 'Basis Data',
            'semester' => 2,
            'sks' => 3
        ]);
        Matkul::create([
            'kode_matkul' => 'psi',
            'nama_matkul' => 'Pemograman Sistem Informasi',
            'semester' => 3,
            'sks' => 3
        ]);


        TahunAjaran::create([
            'kode_tahun' => '212201',
            'tahun_ajaran' => '2021/2022 Ganjil',
            'status_krs' => 1,
            'status_nilai' => 0
        ]);


        Jadwal::create([
            'kode_jadwal' => 'j01',
            'matkul_id' => 1,
            'tahun_ajaran_id' => 1,
            'dosen_id' => 1
        ]);
        Jadwal::create([
            'kode_jadwal' => 'j02',
            'matkul_id' => 1,
            'tahun_ajaran_id' => 1,
            'dosen_id' => 2
        ]);
        Jadwal::create([
            'kode_jadwal' => 'j03',
            'matkul_id' => 2,
            'tahun_ajaran_id' => 1,
            'dosen_id' => 2
        ]);
        Jadwal::create([
            'kode_jadwal' => 'j04',
            'matkul_id' => 2,
            'tahun_ajaran_id' => 1,
            'dosen_id' => 1
        ]);
        Jadwal::create([
            'kode_jadwal' => 'j05',
            'matkul_id' => 3,
            'tahun_ajaran_id' => 1,
            'dosen_id' => 1
        ]);
        Jadwal::create([
            'kode_jadwal' => 'j06',
            'matkul_id' => 3,
            'tahun_ajaran_id' => 1,
            'dosen_id' => 2
        ]);
        Jadwal::create([
            'kode_jadwal' => 'j07',
            'matkul_id' => 4,
            'tahun_ajaran_id' => 1,
            'dosen_id' => 1
        ]);


        for ($i = 1; $i <= 98; $i++) {
            Krs::create([
                'mahasiswa_id' => $i,
                'tahun_ajaran_id' => 1,
                'jadwal_id' => rand(1, 7)
            ]);
        }

        // Krs::create([
        //     'mahasiswa_id' => 1,
        //     'jadwal_id' => 1
        // ]);
        // Krs::create([
        //     'mahasiswa_id' => 1,
        //     'jadwal_id' => 4
        // ]);
        // Krs::create([
        //     'mahasiswa_id' => 1,
        //     'jadwal_id' => 2
        // ]);

        // Krs::create([
        //     'mahasiswa_id' => 2,
        //     'jadwal_id' => 1
        // ]);

        // Krs::create([
        //     'mahasiswa_id' => 3,
        //     'jadwal_id' => 1
        // ]);

        // Krs::create([
        //     'mahasiswa_id' => 4,
        //     'jadwal_id' => 1
        // ]);
        // Krs::create([
        //     'mahasiswa_id' => 4,
        //     'jadwal_id' => 4
        // ]);

        // Krs::create([
        //     'mahasiswa_id' => 5,
        //     'jadwal_id' => 1
        // ]);

        // Krs::create([
        //     'mahasiswa_id' => 6,
        //     'jadwal_id' => 1
        // ]);

        // Krs::create([
        //     'mahasiswa_id' => 7,
        //     'jadwal_id' => 2
        // ]);

        // Krs::create([
        //     'mahasiswa_id' => 8,
        //     'jadwal_id' => 2
        // ]);
    }
}
