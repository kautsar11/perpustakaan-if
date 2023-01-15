<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengunjung', function (Blueprint $table) {
            $table->id();
            $table->string('nim_petugas', 10);
            $table->string('nim', 10);
            $table->string('nama', 50);
            $table->string('kelas', 6);
            $table->string('angkatan', 4);
            $table->string('nomor_telepon', 20);
            $table->date('tgl_kunjungan');
            $table->foreign('nim_petugas')->references('nim')->on('petugas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengunjung');
    }
};
