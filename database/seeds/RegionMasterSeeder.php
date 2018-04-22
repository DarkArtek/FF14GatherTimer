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
            'is_show' => true,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('region_master')->insert([
            'name' => '黒衣森',
            'is_show' => true,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('region_master')->insert([
            'name' => 'ザナラーン',
            'is_show' => true,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('region_master')->insert([
            'name' => 'クルザス',
            'is_show' => true,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('region_master')->insert([
            'name' => 'モードゥナ',
            'is_show' => true,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('region_master')->insert([
            'name' => 'アバラシア',
            'is_show' => true,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('region_master')->insert([
            'name' => 'ドラヴァニア',
            'is_show' => true,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('region_master')->insert([
            'name' => 'ギラバニア',
            'is_show' => true,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('region_master')->insert([
            'name' => 'ひんがしの国',
            'is_show' => false,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('region_master')->insert([
            'name' => 'オサード',
            'is_show' => true,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
