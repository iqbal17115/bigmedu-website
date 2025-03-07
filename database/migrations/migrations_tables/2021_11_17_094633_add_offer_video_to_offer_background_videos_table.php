<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOfferVideoToOfferBackgroundVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('offer_background_videos', function (Blueprint $table) {
            $table->string('offer_video')->nullable()->after('youtube_link');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('offer_background_videos', function (Blueprint $table) {
            $table->dropColumn('offer_video')->nullable();
        });
    }
}
