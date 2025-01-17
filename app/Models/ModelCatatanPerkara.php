<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelCatatanPerkara extends Model
{
    use HasFactory;
    protected $table = 'catatan_perkara';
    protected $guarded = ['id_catatan'];
    public $timestamps = false;
}
