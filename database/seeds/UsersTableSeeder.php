<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => "gustavo",
            'email' => "gusasar@gmail.com",
            'password' => bcrypt('gustasar5339')
         ]);
         factory(User::class, 10)->create();
    }
}
