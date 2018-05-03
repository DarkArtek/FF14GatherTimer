<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGatherPlace extends Migration
{
    /**
     * マイグレーション実行
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gather_place', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('class_id')->unsigned();
            $table->integer('gather_place_type_id')->unsigned();
            $table->integer('area_id')->unsigned();
            $table->integer('level');
            $table->time('elapsed_time')->nullable();
            $table->string('memo')->nullable();
            $table->string('place_point', 10)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('class_id')->references('id')->on('class_master');
            $table->foreign('gather_place_type_id')->references('id')->on('gather_place_type_master');
            $table->foreign('area_id')->references('id')->on('area_master');
        });
    }

    /**
     * マイグレーションを元に戻す
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('gather_place');
    }
}
