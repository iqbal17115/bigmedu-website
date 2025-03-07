<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddShowSectionColumnToAlumniBackgroundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('alumni_backgrounds', function (Blueprint $table) {
            $table->tinyInteger('show_section')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('alumni_backgrounds', function (Blueprint $table) {
            $table->dropColumn('show_section');
        });
    }
}
