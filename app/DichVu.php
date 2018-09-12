<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DichVu extends Model
{
    protected $table = 'tb_dichvu';
    public $timestamps = true;
    protected $primaryKey = 'id_dichvu';
    protected $fillable = [
        'tendichvu',
        'mota',
        'demo',
        'giatien',
        'id_loaidv'
    ];
}
