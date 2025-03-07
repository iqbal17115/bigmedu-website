<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnUrlLinkTypeInGetInTouchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('get_in_touches', function (Blueprint $table) {
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
        Schema::table('get_in_touches', function (Blueprint $table) {
            $table->dropColumn('url_link_type')->nullable();
        });
    }
}
