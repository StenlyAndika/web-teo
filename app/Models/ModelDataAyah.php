<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelDataAyah extends Model
{
    use HasFactory;
    protected $table = 'data_ayah';
    protected $guarded = ['id_data_ayah'];
    public $timestamps = false;
}
