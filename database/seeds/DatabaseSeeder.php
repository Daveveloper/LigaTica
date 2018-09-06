<?php

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
        //Users
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        //System
        $this->call(equiposSeeder::class);
        $this->call(jornadasSeeder::class);
        $this->call(partidosSeeder::class);
        $this->call(posicionesSeeder::class);

    }
}
