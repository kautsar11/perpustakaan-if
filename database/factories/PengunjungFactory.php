<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pengunjung>
 */
class PengunjungFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nim_petugas' => '10120155',
            'nim' => fake()->randomElement(['10120155', '10120156', '10120157']),
            'nama' => fake()->name(),
            'kelas' => fake()->randomElement(
                ['IF-1', 'IF-2', 'IF-3']
            ),
            'angkatan' => fake()->randomElement(
                ['2020', '2021', '2022']
            ),
            'nomor_telepon' => fake()->phoneNumber(),
            'tgl_kunjungan' => fake()->date()
        ];
    }
}
