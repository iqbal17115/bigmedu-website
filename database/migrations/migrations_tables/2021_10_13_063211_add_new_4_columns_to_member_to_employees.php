<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNew4ColumnsToMemberToEmployees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('member_to_employees', function (Blueprint $table) {
            $table->tinyInteger('dept_or_project')->nullable()->comment("1 = dept, 2 = project")->after('member_id');
            $table->unsignedBigInteger('dept_id')->nullable()->after('dept_or_project');
            $table->unsignedBigInteger('project_id')->nullable()->after('dept_id');
            $table->integer('ext_no')->nullable()->after('project_id');

            $table->foreign('dept_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('member_to_employees', function (Blueprint $table) {
            //$table->dropColumn('dept_or_project');
            $table->dropForeign(['dept_id']);
            $table->dropForeign(['project_id']);
            $table->dropColumn('dept_id');
            $table->dropColumn('project_id');
            $table->dropColumn('ext_no');
        });
    }
}
