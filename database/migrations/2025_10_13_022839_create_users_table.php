<?php

use Illuminate\Database\Migrations\Migration;

// Duplicate users migration — converted to no-op. The real users migration
// is `2025_10_13_022825_create_users_table.php`.
return new class extends Migration
{
    public function up(): void
    {
        // intentionally left blank (duplicate)
    }

    public function down(): void
    {
        // intentionally left blank
    }
};

