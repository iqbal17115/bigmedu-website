<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('program_info_id')->nullable();
            $table->string('name')->nullable();
            $table->string('short_name')->nullable();
            $table->timestamps();
            $table->foreign('program_info_id')->references('id')->on('program_infos')->onDelete('cascade');
        });

        DB::table('course_infos')->insert([
            ['id' => 1,'program_info_id'=>1, 'name' => 'Governance and Public Policy','short_name'=>'GPP'],
            ['id' => 2,'program_info_id'=>1, 'name' => 'International Economic Relations','short_name'=>'IER'],
            ['id' => 3,'program_info_id'=>1, 'name' => 'Human Resource Management','short_name'=>'HRM'],
            ['id' => 4,'program_info_id'=>1, 'name' => 'Project Management','short_name'=>'PM'],
            ['id' => 5,'program_info_id'=>1, 'name' => 'Public and Financial Management','short_name'=>'PFM'],
            ['id' => 6,'program_info_id'=>1, 'name' => 'Procurement and Supply Chain Management','short_name'=>'PSCM']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_infos');
    }
}
