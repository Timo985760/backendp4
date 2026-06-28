<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class ImportStoredProcedures extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $dir = database_path('createscripts');

        if (! is_dir($dir)) {
            return;
        }

        $files = glob($dir.'/*.sql');

        foreach ($files as $file) {
            $sql = file_get_contents($file);
            if ($sql !== false && trim($sql) !== '') {
                DB::unprepared($sql);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $dir = database_path('createscripts');

        if (! is_dir($dir)) {
            return;
        }

        $files = glob($dir.'/*.sql');

        foreach ($files as $file) {
            $sql = file_get_contents($file);
            if ($sql === false) {
                continue;
            }

            if (preg_match('/CREATE\s+PROCEDURE\s+`?([a-zA-Z0-9_]+)`?/i', $sql, $m)) {
                $name = $m[1];
                DB::unprepared("DROP PROCEDURE IF EXISTS `{$name}`;");
            }
        }
    }
}
