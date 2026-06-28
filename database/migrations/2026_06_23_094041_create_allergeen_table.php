<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Allergeen', function (Blueprint $table) {
            $table->increments('Id');
            $table->string('Naam', 50);
            $table->string('Omschrijving', 255);
            $table->boolean('IsActief')->default(true);
            $table->string('Opmerking', 225)->nullable();
            $table->timestamps();
        });

        // Seed some sample data
        DB::table('Allergeen')->insert([
            ['Naam' => 'Gluten', 'Omschrijving' => 'Glutenbevattende granen zoals tarwe, rogge, gerst, haver.'],
            ['Naam' => 'Lactose', 'Omschrijving' => 'Melk en producten op basis van melk (inclusief lactose).'],
            ['Naam' => 'Noten', 'Omschrijving' => 'Amandelen, hazelnoten, walnoten, cashewnoten, pecannoten.'],
            ['Naam' => 'Pinda', 'Omschrijving' => 'Pindaproducten en aardnoten.'],
        ]);

        // Register the stored procedure
        DB::unprepared('
            DROP PROCEDURE IF EXISTS SP_GetAllAllergenen;
            CREATE PROCEDURE SP_GetAllAllergenen()
            BEGIN
                SELECT ALGE.Id
                      ,ALGE.Naam
                      ,ALGE.Omschrijving
                FROM Allergeen AS ALGE;
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS SP_GetAllAllergenen;');
        Schema::dropIfExists('Allergeen');
    }
};
