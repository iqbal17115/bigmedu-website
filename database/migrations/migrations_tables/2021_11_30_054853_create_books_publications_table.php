<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksPublicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books_publications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type')->nullable()->comment('1=New Arrivals,2=Upcoming Books,3=Publications/Journal');
            $table->string('image')->nullable();
            $table->tinyInteger('show_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books_publications');
    }
}
