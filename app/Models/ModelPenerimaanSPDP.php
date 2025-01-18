<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelPenerimaanSPDP extends Model
{
    use HasFactory;
    protected $table = 'penerimaan_spdp';
    protected $guarded = ['id_penerimaan_spdp'];
    public $timestamps = false;
}
