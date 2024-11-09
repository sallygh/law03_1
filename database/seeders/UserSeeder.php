<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'lawsysy_sally',
            'email' => 'lawsysy_sally@localhost',
            'password' => Hash::make('Z9kOh7vnlZP1'),
        ]);
    }
}
