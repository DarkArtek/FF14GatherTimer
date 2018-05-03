<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegionMaster extends Migration
{
    /**
     * マイグレーション実行
     *
     * @return void
     */
    public function up()
    {
        Schema::create('region_master', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->boolean('is_show')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * マイグレーションを元に戻す
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('region_master');
    }
}
