<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = 'tb_goi';
    public $timestamps = true;
    protected $primaryKey = 'id_goi';
    protected $fillable = [
        'id_user',
    ];
}
