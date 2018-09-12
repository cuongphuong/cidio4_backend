<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChucVu extends Model
{
    protected $table = 'tb_chucvu';
    public $timestamps = true;
    protected $primaryKey = 'id_chucvu';
    protected $fillable = [
        'tenchucvu'
    ];

}
