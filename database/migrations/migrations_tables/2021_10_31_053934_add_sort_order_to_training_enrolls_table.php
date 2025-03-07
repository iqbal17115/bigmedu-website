<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSortOrderToTrainingEnrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('training_enrolls', function (Blueprint $table) {
            $table->integer('sort_order')->nullable()->after('training_url');
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
            $table->dropColumn('sort_order');
        });
    }
}
