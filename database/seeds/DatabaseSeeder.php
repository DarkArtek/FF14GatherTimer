<?php

use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RegionMasterSeeder::class);
        $this->call(PurifiedMasterSeeder::class);
        $this->call(ClassMasterSeeder::class);
        $this->call(GatherPlaceTypeMasterSeeder::class);
        $this->call(AreaMasterSeeder::class);
        $this->call(GatherItemSeeder::class);
        $this->call(GatherPlaceSeeder::class);
        $this->call(ShelfMasterSeeder::class);
        $this->call(GatherPlaceGatherItemSeeder::class);
        $this->call(GatherItemPurifiedISeeder::class);
        $this->call(GatherTimeSeeder::class);
    }
}
