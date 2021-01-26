<?php

use Illuminate\Database\Seeder;

class PerfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('perfiles')->insert([
            array(
                'user_id' => '1',
                'nombre' => 'Timothy',
                'apellido' => 'Wider',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            )
        ]);
    }
}
/*
 *             $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('nombre');
            $table->string('apellido');
            $table->timestamps();
 *
 */
