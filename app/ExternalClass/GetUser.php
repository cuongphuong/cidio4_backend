<?php
namespace App\ExternalClass;
class GetUser{
    public function sayHello(){
        return 'Hello you';
    }

    public function searchUserByPhone($numberPhone){
        $lst = DB::table('users')->where('sodienthoai', 'like', '%'.$numberPhone);
        return $lst;
    }

    public function searchUserByName($name){
        $lst = DB::table('users')->where('name', 'like', '%'.$name);
        return $lst;
    }
}