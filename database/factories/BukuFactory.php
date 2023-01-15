<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Spatie\LaravelIgnition\Support\Composer\FakeComposer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Buku>
 */
class BukuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'no_buku' => fake()->unique()->numberBetween(1, 100),
            'judul' => fake()->title(),
            'jenis' => fake()->randomElement(['skripsi', 'pendidikan']),
            'penulis' => fake()->name(),
            'status' => fake()->randomElement(['tersedia', 'dipinjam', 'hilang'])
        ];
    }
}
