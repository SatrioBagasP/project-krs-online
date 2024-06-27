<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_mahasiswa' => $this->faker->name(),
            // 'npm' => mt_rand(1, 10),
            // 'id_user' => mt_rand(1, 10)
        ];
    }
}
