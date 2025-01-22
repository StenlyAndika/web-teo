<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelJaksaPenuntut extends Model
{
    use HasFactory;
    protected $table = 'jaksa_penuntut';
    protected $guarded = ['id_jaksa_penuntut'];
    public $timestamps = false;
}
