<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\UserSeeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Call our custom seeder
        $this->call([
            UserSeeder::class,
        ]);
    }
}
