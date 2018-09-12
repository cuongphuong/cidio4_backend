<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'tb_theloai';
    public $timestamps = true;
    protected $primaryKey = 'id_theloai';
    protected $fillable = [
        'tentheloai',
        'mota',
    ];
}
