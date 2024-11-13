<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('standards', function (Blueprint $table) {
            $table->unsignedBigInteger('discipline_id')->after('id');
            $table->foreign('discipline_id')->references('id')->on('disciplines')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('standards', function (Blueprint $table) {
            $table->dropForeign(['discipline_id']);
            $table->dropColumn('discipline_id');
        });
    }
};
