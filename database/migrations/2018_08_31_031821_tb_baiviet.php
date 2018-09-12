<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbBaiviet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_baiviet', function (Blueprint $table) {
            $table->increments('id_baiviet');
            $table->string('tieude')->nullable(false);
            $table->text('noidung')->nullable(false);
            $table->integer('id_user')->nullable(false)->unsigned();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->integer('id_theloai')->nullable(false)->unsigned();
            $table->foreign('id_theloai')->references('id_theloai')->on('tb_theloai')->onDelete('cascade');
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
        //
    }
}
