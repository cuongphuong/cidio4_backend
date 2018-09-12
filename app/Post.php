<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'tb_baiviet';
    public $timestamps = true;
    protected $primaryKey = 'id_baiviet';
    protected $fillable = [
        'tieude',
        'noidung',
        'id_user',
        'id_theloai',
    ];
}
