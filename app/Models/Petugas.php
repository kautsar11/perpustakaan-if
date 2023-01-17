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
    protected $guarded = [];

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
}
