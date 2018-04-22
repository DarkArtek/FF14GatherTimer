<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreaMaster extends Migration
{
    /**
     * マイグレーション実行
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_master', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('region_id')->unsigned();
            $table->string('patch',4);
            $table->string('map');
            $table->boolean('is_show')->default(true);
            $table->timestamps();
            $table->foreign('region_id')->references('id')->on('region_master');

        });
    }

    /**
     * マイグレーションを元に戻す
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('area_master');
    }
}
