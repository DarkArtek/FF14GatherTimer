<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassMaster extends Migration
{
    /**
     * マイグレーション実行
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_master', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('icon')->nullable();
            $table->timestamps();
        });
    }

    /**
     * マイグレーションを元に戻す
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('class_master');
    }
}
