<?php
namespace App\ExternalClass;

class GetUser
{
    public function thongkemon()
    {
        $list = DB::select(DB::raw('SELECT COUNT(*) tb_dichvu FROM tb_dichvu WHERE id_loaidv = 1'))->get();
        return $list;
    }
}