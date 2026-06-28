<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Increase Naam column length to 100 characters
        DB::statement("ALTER TABLE `Allergeen` MODIFY `Naam` VARCHAR(100);");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert to 50 characters
        DB::statement("ALTER TABLE `Allergeen` MODIFY `Naam` VARCHAR(50);");
    }
};
