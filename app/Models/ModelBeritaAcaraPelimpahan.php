<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelBeritaAcaraPelimpahan extends Model
{
    use HasFactory;
    protected $table = 'berita_acara_pelimpahan';
    protected $primaryKey = 'id_berita_acara_pelimpahan';
    protected $guarded = [];
    public $timestamps = false;
}
