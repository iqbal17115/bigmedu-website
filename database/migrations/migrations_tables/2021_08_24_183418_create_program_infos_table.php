<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateProgramInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('short_name')->nullable();
            $table->timestamps();
        });
        
        DB::table('program_infos')->insert([
            ['id' => 1, 'name' => 'Masters in Public Affairs','short_name'=>'MPA'],
            ['id' => 2, 'name' => 'Master of Philosophy','short_name'=>'MPhil'],
            ['id' => 3, 'name' => 'Doctor of Philosophy','short_name'=>'PhD']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('program_infos');
    }
}
