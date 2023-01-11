<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Petugas;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Petugas::factory()->create([
            'nim' => '10120155',
            'nama' => 'test',
            'password' => bcrypt('10120155'),
            'role' => 'admin'
        ]);
        Petugas::factory()->create([
            'nim' => '10120156',
            'nama' => 'test',
            'password' => bcrypt('10120156'),
            'role' => 'petugas'
        ]);
    }
}
