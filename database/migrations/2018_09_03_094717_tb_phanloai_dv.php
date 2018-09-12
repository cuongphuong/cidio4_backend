<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TbPhanloaiDv extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_phanloai_dichvu', function (Blueprint $table) {
            $table->increments('id_loaidv');
            $table->string('tenloaidv')->nullable(false);
            $table->string('mota')->nullable(false);
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
        Schema::table('tb_phanloai_dichvu', function (Blueprint $table) {
            //
        });
    }
}
