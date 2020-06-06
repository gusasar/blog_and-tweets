<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Entry;

class EntriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuarios=User::all();
        $usuarios->each(function($user){
            factory(Entry::class, 10)->create([
                'user_id'=>$user->id
            ]);
        });
    }
}
