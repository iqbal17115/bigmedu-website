<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEducationToYearToMemberEducations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('membereducations', function (Blueprint $table) {
            $table->string('education_to_year')->nullable()->after('education_year');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('membereducations', function (Blueprint $table) {
            $table->dropColumn('education_to_year');
        });
    }
}
