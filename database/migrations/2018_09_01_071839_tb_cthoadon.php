<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbCthoadon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_cthoadon', function (Blueprint $table) {
            $table->increments('id_cthd');
            $table->integer('id_hoadon')->nullable(false)->unique()->unsigned();
            $table->foreign('id_hoadon')->references('id_hoadon')->on('tb_hoadon')->onDelete('cascade');
            $table->dateTime('ngaytochuc')->nullable(false);
            $table->string('diadiemtochuc')->nullable(false);
            $table->string('khonggianmau');
            //
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
