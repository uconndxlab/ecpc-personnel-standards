<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisciplineStateTable extends Migration
{
    public function up()
    {
        Schema::create('discipline_state', function (Blueprint $table) {
            $table->id();
            $table->foreignId('discipline_id')->constrained()->onDelete('cascade');
            $table->foreignId('state_id')->constrained()->onDelete('cascade');
            // Add additional fields as needed, e.g., specific requirements for each state
            $table->text('specific_requirements')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('discipline_state');
    }
}
