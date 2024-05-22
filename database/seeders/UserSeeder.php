<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Lorem Ipsum',
            'email' => 'lorem@ipsum.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Prova Prova',
            'email' => 'prova@prova.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'example',
            'email' => 'example@example.com',
            'password' => Hash::make('password'),
        ]);
    }
}
