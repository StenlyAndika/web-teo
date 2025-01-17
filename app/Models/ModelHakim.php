<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelHakim extends Model
{
    use HasFactory;
    protected $table = 'hakim';
    protected $guarded = ['id_hakim'];
    public $timestamps = false;
}
