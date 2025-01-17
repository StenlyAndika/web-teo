<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelSidang extends Model
{
    use HasFactory;
    protected $table = 'sidang';
    protected $guarded = ['id_sidang'];
    public $timestamps = false;
}
