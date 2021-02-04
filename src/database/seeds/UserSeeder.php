<?php


use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 5000)
            ->create()
            ->each(function ($u) {
                $u->profile()->save(factory(App\Profile::class)->make());
            });;
    }
}
