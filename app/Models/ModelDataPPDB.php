<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelDataPPDB extends Model
{
    use HasFactory;
    protected $table = 'data_ppdb';
    protected $guarded = ['id_data_ppdb'];
    public $timestamps = false;
}
