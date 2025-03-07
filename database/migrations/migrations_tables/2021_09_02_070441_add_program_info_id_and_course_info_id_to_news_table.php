<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProgramInfoIdAndCourseInfoIdToNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->unsignedBigInteger('program_info_id')->nullable()->after('id');
            $table->unsignedBigInteger('course_info_id')->nullable()->after('program_info_id');

            $table->foreign('program_info_id')->references('id')->on('program_infos')->onDelete('cascade');;
            $table->foreign('course_info_id')->references('id')->on('course_infos')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('news', function (Blueprint $table) {

            $table->dropForeign(['program_info_id']);
            $table->dropForeign(['course_info_id']);

        });
    }
}
