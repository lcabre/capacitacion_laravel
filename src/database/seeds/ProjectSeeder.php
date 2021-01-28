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
        DB::table('projects')->insert([
            array(
                'nombre' => 'CallCenter',
                'fecha_entrega' => '2021-01-24',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ),
            array(
                'nombre' => 'Nexo',
                'fecha_entrega' => '2021-01-24',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ),
            array(
                'nombre' => 'Dashboard',
                'fecha_entrega' => '2021-01-24',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            )
        ]);
    }
}
