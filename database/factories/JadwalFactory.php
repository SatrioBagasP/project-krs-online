<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class JadwalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'dosen_id' => mt_rand(1, 5),
            'matkul_id' => mt_rand(1, 10)
        ];
    }
}
