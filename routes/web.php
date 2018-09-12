<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('qb/raw', function () {
    $data = DB::table('users')->select(DB::raw('id, name as hoten, std'))->where('id', 2)->get();
    foreach ($data as $row) {
        foreach ($row as $key => $value) {
            echo $key.':'.$value.'<br>';
        }
        echo '<hr>';
    }
});
