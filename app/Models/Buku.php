<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $incrementing = false;

    protected $table = 'buku';
    protected $primaryKey = 'no_buku';
    protected $keyType = 'string';

    protected $guarded = [];

    public function scopeSearch(Builder $query, $search)
    {
        $query->when(
            request()->is('buku'),
            fn ($query) => $query
                ->where('judul', 'like', '%' . $search . '%')
                ->orWhere('jenis', 'like', '%' . $search . '%')
                ->orWhere('penulis', 'like', '%' . $search . '%')
                ->orWhere('no_buku', 'like', '%' . $search . '%')
        );
    }

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'no_buku', 'no_buku');
    }
}
