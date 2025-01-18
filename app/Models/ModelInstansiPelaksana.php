<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelInstansiPelaksana extends Model
{
    use HasFactory;
    protected $table = 'instansi_pelaksana';
    protected $guarded = ['id_instansi_pelaksana'];
    public $timestamps = false;
}
