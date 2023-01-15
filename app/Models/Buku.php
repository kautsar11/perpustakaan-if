<?php

namespace App\Models;

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
}
