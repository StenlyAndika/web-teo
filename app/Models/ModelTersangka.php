<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelTersangka extends Model
{
    use HasFactory;
    protected $table = 'tersangka';
    protected $guarded = ['id_tersangka'];
    public $timestamps = false;
}
