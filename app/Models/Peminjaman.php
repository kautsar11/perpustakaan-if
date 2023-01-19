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
                ->where('nim', 'like', '%' . $search . '%')
                ->orWhere('kelas', 'like', '%' . $search . '%')
                ->orWhere('nama', 'like', '%' . $search . '%')
                ->orWhere('angkatan', 'like', '%' . $search . '%')
                ->orWhere('nomor_telepon', 'like', '%' . $search . '%')
                ->orWhere('id', 'like', '%' . $search . '%')
        );
    }
}
