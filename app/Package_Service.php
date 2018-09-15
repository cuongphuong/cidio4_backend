<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package_Service extends Model
{
    protected $table = 'tb_goi_dichvu';
    public $timestamps = true;
    protected $primaryKey = ['id_dichvu', 'id_dichvu'];
    public $incrementing = false;
    protected $fillable = [
        'id_goi',
        'id_dichvu',
        'soluong',
    ];
}
