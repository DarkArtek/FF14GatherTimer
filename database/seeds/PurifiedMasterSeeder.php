<?php

use Illuminate\Database\Seeder;

class PurifiedMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('purified_master')->insert([
            'name' => '微光の霊砂',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('purified_master')->insert([
            'name' => '暁光の霊砂',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('purified_master')->insert([
            'name' => '大地の霊砂',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('purified_master')->insert([
            'name' => '大樹の霊砂',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('purified_master')->insert([
            'name' => '大海の霊砂',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('purified_master')->insert([
            'name' => '白光の霊砂',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('purified_master')->insert([
            'name' => '極光の霊砂',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('purified_master')->insert([
            'name' => '悠久の霊砂',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('purified_master')->insert([
            'name' => '豊穣の霊砂',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('purified_master')->insert([
            'name' => '深淵の霊砂',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('purified_master')->insert([
            'name' => '夜光の霊砂',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
