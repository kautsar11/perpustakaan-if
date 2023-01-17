<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengunjung extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'pengunjung';

    protected $guarded = [];
}
