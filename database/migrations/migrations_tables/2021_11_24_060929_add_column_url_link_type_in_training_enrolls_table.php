<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnUrlLinkTypeInTrainingEnrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('training_enrolls', function (Blueprint $table) {
            $table->string('url_link_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('training_enrolls', function (Blueprint $table) {
            $table->dropColumn('url_link_type')->nullable();
        });
    }
}
