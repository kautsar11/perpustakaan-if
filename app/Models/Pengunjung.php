<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengunjung extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'pengunjung';

    protected $guarded = [];

    public function scopeSearch(Builder $query, $search)
    {
        $query->when(
            request()->is('pengunjung') || request()->is('pengunjung/export'),
            fn () => $query
                ->where('nim', 'like', '%' . $search . '%')
                ->orWhere('kelas', 'like', '%' . $search . '%')
                ->orWhere('nama', 'like', '%' . $search . '%')
                ->orWhere('angkatan', 'like', '%' . $search . '%')
                ->orWhere('nomor_telepon', 'like', '%' . $search . '%')
                ->orWhere('id', 'like', '%' . $search . '%')
        );
    }

    public function scopeDariTgl(Builder $query, $tgl)
    {
        $query->when($tgl ?? false, fn () => $query->where('tgl_kunjungan', '>=', $tgl));
    }

    public function scopeSampaiTgl(Builder $query, $tgl)
    {
        $query->when($tgl ?? false, fn () => $query->where('tgl_kunjungan', '<=', $tgl));
    }

    public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'nim_petugas', 'nim');
    }

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'id_pengunjung', 'id');
    }
}
