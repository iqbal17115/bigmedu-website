<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacultyTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faculty_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type')->nullable();
            $table->integer('sort_order')->nullable();
            $table->timestamps();
        });

        DB::table('faculty_types')->insert([
            ['id' => 1, 'type' => 'Regular Faculty', 'sort_order' => 1],
            ['id' => 2, 'type' => 'Adjunct Faculty', 'sort_order' => 2],
            ['id' => 3, 'type' => 'Part-time Faculty', 'sort_order' => 3],
            ['id' => 4, 'type' => 'Resource Person', 'sort_order' => 4],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faculty_types');
    }
}
