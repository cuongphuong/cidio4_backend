<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sodienthoai');
            $table->string('hoten');
            $table->string('dichi');
            $table->string('password');
            $table->tinyInteger('gioitinh');
            $table->integer('id_chucvu')->unsigned();
            $table->foreign('id_chucvu')->references('id_chucvu')->on('tb_chucvu')->onDelete('cascade');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
