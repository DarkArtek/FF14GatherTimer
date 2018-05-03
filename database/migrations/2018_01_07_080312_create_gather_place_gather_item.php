<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGatherPlaceGatherItem extends Migration
{
    /**
     * マイグレーション実行
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gather_place_gather_item', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gather_place_id')->unsigned();
            $table->integer('gather_item_id')->unsigned();
            $table->integer('shelf_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('gather_place_id')->references('id')->on('gather_place');
            $table->foreign('gather_item_id')->references('id')->on('gather_item');
            $table->foreign('shelf_id')->references('id')->on('shelf_master');
        });
    }

    /**
     * マイグレーションを元に戻す
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('gather_place_gather_item');
    }
}
