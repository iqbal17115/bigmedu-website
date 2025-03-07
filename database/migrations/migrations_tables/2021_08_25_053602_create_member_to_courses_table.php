<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberToCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_to_courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('course_info_id')->nullable();
            $table->unsignedBigInteger('member_id')->nullable();
            $table->unsignedBigInteger('faculty_type_id')->nullable();
            $table->integer('sort_order')->nullable();
            $table->timestamps();
            $table->foreign('course_info_id')->references('id')->on('course_infos')->onDelete('cascade');
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
            $table->foreign('faculty_type_id')->references('id')->on('faculty_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_to_courses');
    }
}
