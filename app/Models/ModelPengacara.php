<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelPengacara extends Model
{
    use HasFactory;
    protected $table = 'pengacara';
    protected $guarded = ['id_pengacara'];
    public $timestamps = false;
}
