<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelKategori extends Model
{
    use HasFactory;
    protected $table = 'kategori_tindak_pidana';
    protected $guarded = ['id_kategori'];
    public $timestamps = false;
}
