<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        \App\User::create([
            'name'=>"Motiur",
            'email'=>"memotiur@gmail.com",
            'password'=>Hash::make('123456'),
        ]);
        \App\User::create([
            'name'=>"saiful",
            'email'=>"saiful013101@gmail.com",
            'password'=>Hash::make('1234'),
        ]);
    }
}
