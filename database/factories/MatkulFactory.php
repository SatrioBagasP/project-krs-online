<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MatkulFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_matkul' => $this->faker->name(),
            // 'kode_matkul' => mt_rand(1, 10),
            'sks' => mt_rand(2, 4)
        ];
    }
}
