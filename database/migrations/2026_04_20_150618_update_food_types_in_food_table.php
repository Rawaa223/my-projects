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
        // Update 'Speciality' to 'Specialty'
        DB::table('food')->where('food_type', 'Speciality')->update(['food_type' => 'Specialty']);

        // Set invalid food types to null (only allow Starters, Salads, Specialty)
        DB::table('food')
            ->whereNotIn('food_type', ['Starters', 'Salads', 'Specialty'])
            ->update(['food_type' => null]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Reverse the changes - set null back to a default or leave as is
        // Since we don't know the original values, we'll leave them as null
    }
};
