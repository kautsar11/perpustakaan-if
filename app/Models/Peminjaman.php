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
    protected $primaryKey = 'no_peminjaman';

    protected $guarded = [];

    public function scopeSearch(Builder $query, $search)
    {
        $query->when(
            request()->is('peminjaman') || request()->is('peminjaman/export'),
            fn () => $query
                ->where('no_peminjaman', 'like', '%' . $search . '%')
                ->orWhere('nim_petugas_pinjam', 'like', '%' . $search . '%')
                ->orWhere('nama_petugas_kembali', 'like', '%' . $search . '%')
                ->orWhere('nim_peminjam', 'like', '%' . $search . '%')
                ->orWhere('nama_peminjam', 'like', '%' . $search . '%')
        );
    }

    public function scopeDariTgl(Builder $query, $tgl)
    {
        $query->when($tgl ?? false, fn () => $query->where('tgl_pinjam', '>=', $tgl));
    }

    public function scopeSampaiTgl(Builder $query, $tgl)
    {
        $query->when($tgl ?? false, fn () => $query->where('tgl_pinjam', '<=', $tgl));
    }

    public function scopeStatus(Builder $query, $status)
    {
        if ($status != 'semua') {
            $query->when($status ?? false, fn () => $query->where('status', $status));
        }
    }

    public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'nim_petugas_pinjam', 'nim');
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'no_buku', 'no_buku');
    }
}
