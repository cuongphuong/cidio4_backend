<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    //
    protected $table = 'tb_hoadon';
    public $timestamps = true;
    protected $primaryKey = 'id_hoadon';
    protected $fillable = [
        'id_user',
        'id_goi',
        'tinhtrang',
        'tongtien',
    ];
}
