<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelPenBT1 extends Model
{
    use HasFactory;
    protected $table = 'penerimaan_berkas_tahap_i';
    protected $primaryKey = 'id_penerimaan_berkas_tahap_i';
    protected $guarded = [];
    public $timestamps = false;
}
