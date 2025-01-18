<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelWilayahPelimpahan extends Model
{
    use HasFactory;
    protected $table = 'wilayah_pelimpahan';
    protected $guarded = ['id_wilayah_pelimpahan'];
    public $timestamps = false;
}
