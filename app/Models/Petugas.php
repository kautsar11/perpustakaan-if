<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Petugas extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false;
    public $incrementing = false;

    protected $table = 'petugas';
    protected $primaryKey = 'nim';
    protected $keyType = 'string';
    protected $fillable  = ['nim', 'nama', 'role', 'password'];

    protected function password(): Attribute
    {
        return Attribute::make(
            set: fn ($password) => bcrypt($password),
        );
    }

    public function scopeSearch(Builder $query, $search)
    {
        $query->when(
            request()->is('/'),
            fn () => $query
                ->where('nim', 'like', '%' . $search . '%')
                ->orWhere('nama', 'like', '%' . $search . '%')
        );
    }

    public function pengunjung()
    {
        return $this->hasMany(Pengunjung::class, 'nim_petugas', 'nim');
    }

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'nim_petugas_pinjam', 'nim');
    }
}
