<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTaglines extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taglines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('module_name')->nullable();
            $table->string('first_line_first_part')->nullable();
            $table->string('first_line_second_part')->nullable();
            $table->string('second_line_first_part')->nullable();
            $table->string('second_line_second_part')->nullable();
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
        Schema::dropIfExists('taglines');
    }
}
