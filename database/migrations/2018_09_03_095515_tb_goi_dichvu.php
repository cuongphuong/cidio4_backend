<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbGoiDichvu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_goi_dichvu', function (Blueprint $table) {
            $table->integer('id_goi')->nullable(false)->unsigned();
            $table->integer('id_dichvu')->nullable(false)->unsigned();
            $table->foreign('id_goi')->references('id_goi')->on('tb_goi')->onDelete('cascade');
            $table->foreign('id_dichvu')->references('id_dichvu')->on('tb_dichvu')->onDelete('cascade');
            
            $table->integer('soluong');
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
        Schema::table('tb_goi_dichvu', function (Blueprint $table) {
            //
        });
    }
}
