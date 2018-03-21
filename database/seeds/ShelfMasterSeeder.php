<?php

use Illuminate\Database\Seeder;

class ShelfMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shelf_master')->insert([
            'name' => 'shelf1',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('shelf_master')->insert([
            'name' => 'shelf2',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('shelf_master')->insert([
            'name' => 'shelf3',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('shelf_master')->insert([
            'name' => 'shelf4',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('shelf_master')->insert([
            'name' => 'shelf5',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('shelf_master')->insert([
            'name' => 'shelf6',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('shelf_master')->insert([
            'name' => 'shelf7',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('shelf_master')->insert([
            'name' => 'shelf8',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('shelf_master')->insert([
            'name' => 'shelf_hidden1',
            'is_hidden' => true,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('shelf_master')->insert([
            'name' => 'shelf_hidden2',
            'is_hidden' => true,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
