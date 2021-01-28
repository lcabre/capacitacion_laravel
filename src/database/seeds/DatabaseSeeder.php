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
        // $this->call(UserSeeder::class);
         $this->call(RoleSeeder::class);
         //TODO como hacer que funcione una nueva
         $this->call(ProjectSeeder::class);
    }
}
