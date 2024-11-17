<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('standards', function (Blueprint $table) {
            $table->text('licensure_specific_coursework')->nullable()->change();
            $table->text('licensure_dependent_on_exam')->nullable()->change();
            $table->text('additional_req_part_c')->nullable()->change();
            $table->text('additional_req_schools')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('standards', function (Blueprint $table) {
            // Rollback changes by reverting the columns back to boolean and setting default values
            $table->boolean('licensure_specific_coursework')->default(false)->nullable()->change();
            $table->boolean('licensure_dependent_on_exam')->default(false)->nullable()->change();
            $table->boolean('additional_req_part_c')->default(false)->nullable()->change();
            $table->boolean('additional_req_schools')->default(false)->nullable()->change();
        });
    }
};
