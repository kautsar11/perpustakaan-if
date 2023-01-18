<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Buku;
use App\Models\Pengunjung;
use App\Models\Petugas;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::table('petugas')->insert([
            'nim' => '10120155',
            'nama' => 'test',
            'password' => bcrypt('10120155'),
            'role' => 'admin'
        ]);


        Buku::factory(50)->create();
        Pengunjung::factory(50)->create();
    }
}
