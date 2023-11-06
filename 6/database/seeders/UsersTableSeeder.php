<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // ユーザー1
        DB::table('users')->insert([
            'name' => 'user1',
            'email' => 'user1@example.com',
            'password' => Hash::make('password1'),
        ]);

        // ユーザー2
        DB::table('users')->insert([
            'name' => 'user2',
            'email' => 'user2@example.com',
            'password' => Hash::make('password2'),
        ]);

        // ユーザー3
        DB::table('users')->insert([
            'name' => 'user3',
            'email' => 'user3@example.com',
            'password' => Hash::make('password3'),
        ]);
    }
}
