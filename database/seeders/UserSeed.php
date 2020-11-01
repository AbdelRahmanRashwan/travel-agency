<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'email' => 'admin@agency.com',
            'name' => 'admin',
            'password' => Hash::make('password'),
            'type' => 'admin'
        ];

        User::create($data);
    }
}
