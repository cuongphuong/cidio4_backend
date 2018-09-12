<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhanLoaiDichVu extends Model
{
    protected $table = 'tb_phanloai_dichvu';
    public $timestamps = true;
    protected $primaryKey = 'id_loaidv';
    protected $fillable = [
        'tenloaidv',
        'mota',
    ];
}
