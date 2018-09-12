<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbHoadon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_hoadon', function (Blueprint $table) {
            $table->increments('id_hoadon');
            $table->dateTime('ngaylaphoadon');
            $table->integer('id_user')->nullable(false)->unsigned();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->integer('id_goi')->nullable(false)->unsigned();
            $table->foreign('id_goi')->references('id_goi')->on('tb_goi')->onDelete('cascade');
            $table->binary('tinhtrang')->nullable(false);
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
