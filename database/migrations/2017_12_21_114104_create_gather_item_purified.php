<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGatherItemPurified extends Migration
{
    /**
     * マイグレーション実行
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gather_item_purified', function (Blueprint $table) {
            $table->integer('gather_item_id')->unsigned();
            $table->integer('purified_id')->unsigned();
            $table->timestamps();
            $table->foreign('gather_item_id')->references('id')->on('gather_item');
            $table->foreign('purified_id')->references('id')->on('purified_master');
            $table->primary(['gather_item_id', 'purified_id']);
        });
    }

    /**
     * マイグレーションを元に戻す
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('gather_item_purified');
    }
}
