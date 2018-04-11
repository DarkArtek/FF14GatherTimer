<?php

use Illuminate\Database\Seeder;

class RegionMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('region_master')->insert([
            'name' => 'ラノシア',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('region_master')->insert([
            'name' => '黒衣森',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('region_master')->insert([
            'name' => 'ザナラーン',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('region_master')->insert([
            'name' => 'クルザス',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('region_master')->insert([
            'name' => 'モードゥナ',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('region_master')->insert([
            'name' => 'アバラシア',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('region_master')->insert([
            'name' => 'ドラヴァニア',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('region_master')->insert([
            'name' => 'ギラバニア',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('region_master')->insert([
            'name' => 'ひんがしの国',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('region_master')->insert([
            'name' => 'オサード',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
