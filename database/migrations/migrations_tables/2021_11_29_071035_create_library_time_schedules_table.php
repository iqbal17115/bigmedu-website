<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLibraryTimeSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('library_time_schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('saturday_time')->nullable();
            $table->string('sunday_time')->nullable();
            $table->string('monday_time')->nullable();
            $table->string('tuesday_time')->nullable();
            $table->string('wednesday_time')->nullable();
            $table->string('thursday_time')->nullable();
            $table->string('friday_time')->nullable();
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
        Schema::dropIfExists('library_time_schedules');
    }
}
