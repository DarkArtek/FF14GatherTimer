<?php

use Illuminate\Database\Seeder;

class GatherPlaceTypeMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gather_place_type_master')->insert([
            'name' => '未知',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);

        DB::table('gather_place_type_master')->insert([
            'name' => '刻限',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);

        DB::table('gather_place_type_master')->insert([
            'name' => '伝説',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
