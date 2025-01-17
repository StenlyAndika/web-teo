<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelPerkara extends Model
{
    use HasFactory;
    protected $table = 'perkara';
    protected $guarded = ['id_perkara'];
    public $timestamps = false;
}
