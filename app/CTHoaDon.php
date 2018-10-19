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
        'sobantiet',
        'id_hoadon',
        'ngaytochuc',
        'diadiemtochuc',
        'mota'
    ];
}
