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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id('no_peminjaman');
            $table->string('nim_petugas_pinjam', 10);
            $table->string('nim_petugas_kembali', 10);
            $table->foreignId('id_pengunjung')->constrained('pengunjung');
            $table->string('no_buku', 15);
            $table->date('tgl_pinjam');
            $table->date('tgl_kembali');
            $table->enum('status', ['dipinjam', 'dikembalikan', 'hilang']);
            $table->string('keterangan');
            $table->foreign('nim_petugas_pinjam')->references('nim')->on('petugas');
            $table->foreign('nim_petugas_kembali')->references('nim')->on('petugas');
            $table->foreign('no_buku')->references('no_buku')->on('buku');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjaman');
    }
};
