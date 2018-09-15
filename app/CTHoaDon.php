<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CTHoaDon extends Model
{
    //
    protected $table = 'tb_cthoadon';
    public $timestamps = true;
    protected $primaryKey = 'id_cthd';
    protected $fillable = [
        'id_hoadon',
        'ngaytochuc',
        'diadiemtochuc',
        'khonggianmau',
    ];
}
