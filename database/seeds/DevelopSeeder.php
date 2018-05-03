<?php
use Illuminate\Database\Seeder;

class DevelopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'ななつき',
            'email' => 'nanatsukin@gmail.com',
            'password' => '$2y$10$vkorEFyRpSdhOSLV6LE/EOMmb8FJEY7fOFeFydXMVxQ84eU4q7MXe',
            'remember_token' => null,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
