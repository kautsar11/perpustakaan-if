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
            request()->is('pengunjung'),
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
