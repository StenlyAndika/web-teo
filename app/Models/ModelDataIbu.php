<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelDataIbu extends Model
{
    use HasFactory;
    protected $table = 'data_ibu';
    protected $guarded = ['id_data_ibu'];
    public $timestamps = false;
}
