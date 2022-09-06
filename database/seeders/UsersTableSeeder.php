<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrCreate(
            ['email'        => 'user1@test.com'],
            [
                'name'      => 'Test User 1',
                'password'  => bcrypt('password')
            ]
        );

        User::firstOrCreate(
            ['email'        => 'user2@test.com'],
            [
                'name'      => 'Test User 2',
                'password'  => bcrypt('password')
            ]
        );
    }
}
