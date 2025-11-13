<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'nama' => 'Admin',
                'email' =>  'admin@gmail.com',
                'password' => hash::make('admin'),
                'role' => 'admin',
            ],
            [
                'nama' => 'Dokter', 
                'email' => 'dokter@gmail.com',
                'password' => hash::make('dokter'),
                'role' => 'dokter',

             ]
        ];
        foreach ($user as $user) {
            User::create($user);
        }
    }
}
