<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbDichvu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_dichvu', function (Blueprint $table) {
            $table->increments('id_dichvu');
            $table->string('tendichvu')->nullable(false);
            $table->string('mota')->nullable(false);
            $table->string('demo')->nullable(false);
            $table->float('giatien', 8, 2)->nullable(false);
            $table->integer('id_loaidv')->nullable(false)->unsigned();
            $table->foreign('id_loaidv')->references('id_loaidv')->on('tb_phanloai_dichvu')->onDelete('cascade');
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
        Schema::table('tb_dichvu', function (Blueprint $table) {
            //
        });
    }
}
