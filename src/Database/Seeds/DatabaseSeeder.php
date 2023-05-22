<?php

namespace iLzx\AdminStarter\Database\Seeds;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            KiteMenusTableSeeder::class,
            KiteApiResourceTableSeeder::class,
            KiteSettingsTableSeeder::class,
            KiteIconsTableSeeder::class,
            KiteIconCategorysTableSeeder::class,
        ]);
    }
}
