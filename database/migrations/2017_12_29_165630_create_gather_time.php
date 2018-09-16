<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGatherTime extends Migration
{
    /**
     * マイグレーション実行
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gather_time', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gather_place_id')->unsigned();
            $table->time('start_time')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('gather_place_id')->references('id')->on('gather_place');
        });
    }

    /**
     * マイグレーションを元に戻す
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('gather_time');
    }
}
