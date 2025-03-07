<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOpacityColumnToSliderVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('slider_videos', function (Blueprint $table) {
            $table->string('opacity')->nullable()->after('show_video');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('slider_videos', function (Blueprint $table) {
            $table->dropColumn('opacity');
        });
    }
}
