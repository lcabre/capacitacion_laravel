<?php

use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project')->insert([
            array(
                'name' => 'seederTesting123',
                'deadline' => '2021-01-25 16:44:59',
                'created_at' => '2021-02-01 06:22:18'

                //'updated_at' => \Carbon\Carbon::now()
            )
        ]);
    }
}
