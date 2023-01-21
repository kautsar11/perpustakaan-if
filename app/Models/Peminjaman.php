<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'peminjaman';

    protected $guarded = [];

    public function scopeSearch(Builder $query, $search)
    {
        $query->when(
            request()->is('peminjaman'),
            fn () => $query
                ->where('no_peminjaman', 'like', '%' . $search . '%')
        );
    }

    public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'nim_petugas_pinjam', 'nim');
    }

    public function pengunjung()
    {
        return $this->belongsTo(Pengunjung::class, 'id_pengunjung', 'id');
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'no_buku', 'no_buku');
    }
}
