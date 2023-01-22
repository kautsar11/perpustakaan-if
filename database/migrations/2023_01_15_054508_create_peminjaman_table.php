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
            $table->unsignedBigInteger('no_buku');
            $table->string('nim_petugas_pinjam', 8);
            $table->string('nim_petugas_kembali', 8)->nullable();
            $table->string('nim_peminjam', 8);
            $table->string('nama_peminjam');
            $table->date('tgl_pinjam');
            $table->date('tgl_kembali')->nullable();
            $table->enum('status', ['dipinjam', 'dikembalikan', 'hilang'])->nullable();
            $table->text('keterangan')->nullable();
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
