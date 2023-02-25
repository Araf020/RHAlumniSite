<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
// import Factory;
// use Illuminate\Database\Eloquent\Factories\Factory;
// use Illuminate\Database\Eloquent\ModelFactory;
// use Illuminate\Database\Eloquent\Factory;
use Illuminate\Database\Eloquent\Factories\Factory;


// use Illuminate\Support\Facades\Factory;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // create 1 user
        // my lara version 8.68.0

        
        // $this->call(UsersTableSeeder::class);
        // factory(User::class, 1)->create();
        // Factory::create(User::class, 1);
        // Factory::create(User::class, 1);
        // User::factory()->create();
        // ModelFactory::create(User::class);
        // Factory::create(User::class);


        // 
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}