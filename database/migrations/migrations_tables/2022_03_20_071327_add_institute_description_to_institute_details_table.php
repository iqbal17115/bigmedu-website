<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInstituteDescriptionToInstituteDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('institute_details', function (Blueprint $table) {
            $table->string('institute_description')->nullable()->after('previous_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('institute_details', function (Blueprint $table) {
            $table->dropColumn('institute_description');
        });
    }
}
