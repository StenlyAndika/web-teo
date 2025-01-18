<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelInstansiPenyidik extends Model
{
    use HasFactory;
    protected $table = 'instansi_penyidik';
    protected $guarded = ['id_instansi_penyidik'];
    public $timestamps = false;
}
