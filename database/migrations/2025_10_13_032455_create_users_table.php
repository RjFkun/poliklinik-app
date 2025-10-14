<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// This migration was generated accidentally (duplicate). Make it a no-op so
// migrate won't attempt to create the `users` table twice. The real
// create-users migration is `2025_10_13_022839_create_users_table.php`.
return new class extends Migration
{
    public function up(): void
    {
        // intentionally left blank (duplicate migration)
    }

    public function down(): void
    {
        // intentionally left blank
    }
};
