<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelDataSiswa extends Model
{
    use HasFactory;
    protected $table = 'data_siswa';
    protected $guarded = ['id_data_siswa'];
    public $timestamps = false;
}
