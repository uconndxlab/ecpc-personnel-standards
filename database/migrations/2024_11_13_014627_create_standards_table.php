<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStandardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('standards', function (Blueprint $table) {
            $table->id();
            $table->string('license_certificate');
            $table->string('state_department');
            $table->string('state_department_hyperlink')->nullable();
            $table->string('type_of_license_certificate');
            $table->string('age_range')->nullable();
            $table->string('degree_level_requirement');
            $table->boolean('licensure_specific_coursework')->default(false);
            $table->boolean('licensure_require_fieldwork')->default(false);
            $table->boolean('licensure_dependent_on_exam')->default(false);
            $table->boolean('additional_req_part_c')->default(false);
            $table->boolean('additional_req_schools')->default(false);
            $table->string('additional_route_provisional_temp')->nullable();
            $table->foreignId('discipline_id')->constrained()->onDelete('cascade');
            $table->foreignId('state_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('standards');
    }
}
