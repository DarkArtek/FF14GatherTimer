<?php

use Illuminate\Database\Seeder;

class ClassMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('class_master')->insert([
            'name' => '採掘',
            'icon' => 'Miner.png',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('class_master')->insert([
            'name' => '園芸',
            'icon' => 'Botanist.png',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
