<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelPelimpahan extends Model
{
    use HasFactory;
    protected $table = 'pelimpahan';
    protected $guarded = ['id_pelimpahan'];
    public $timestamps = false;
}
