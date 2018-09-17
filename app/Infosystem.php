<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Infosystem extends Model
{
    //
    protected $table = 'tb_infosystem';
    public $timestamps = true;
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'domain',
        'description',
        'keyword',
        'author',
    ];
}
