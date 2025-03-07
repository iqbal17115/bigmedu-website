<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDescriptionToTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teachers', function (Blueprint $table) {
            //
            $table->text('degree')->nullable()->after('email');
            $table->string('room')->nullable()->after('serial');
            $table->text('description')->nullable()->after('serial');
            $table->text('research')->nullable()->after('serial');
            $table->text('patent')->nullable()->after('serial');
            $table->text('publication')->nullable()->after('serial');
            $table->text('award')->nullable()->after('serial');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('teachers', function (Blueprint $table) {
            //
        });
    }
}
