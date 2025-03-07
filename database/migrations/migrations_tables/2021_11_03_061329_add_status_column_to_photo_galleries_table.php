<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusColumnToPhotoGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('photo_galleries', function (Blueprint $table) {
            $table->tinyInteger('status')->nullable()->after('publish_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('photo_galleries', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
