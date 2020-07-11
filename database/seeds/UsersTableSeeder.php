<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class, 1)->states('admin')->create();
        factory(\App\User::class, 5)->states('candidate')->create();
        factory(\App\User::class, 5)->states('voter')->create();
        
    }
}
// Create 5 users

// Create 5 Admins

// Create 5 Moderators

// Create 5 Admins that are also moderators