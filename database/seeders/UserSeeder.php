<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'perviz',
            'email' => 'perviz@mail.ru',
            'password' => Hash::make('123'),
            'is_admin' => 1
        ]);
        User::create([
            'name' => 'toqrul',
            'email' => 'toqrul@mail.ru',
            'password' => Hash::make('123'),
            'is_admin' => 0
        ]);
    }
}
