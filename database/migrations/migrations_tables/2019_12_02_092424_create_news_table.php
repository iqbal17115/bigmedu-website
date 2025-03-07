<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image')->nullable();
            $table->date('date')->nullable();
            $table->string('title')->nullable();
            $table->text('short_description')->nullable();
            $table->text('long_description')->nullable();
            $table->integer('type')->comment('1=news,2=event,3=notice,4=general,5=special,6=tender  ');
            $table->string('facebook_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('googleplus_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('youtube_url')->nullable();
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
        Schema::dropIfExists('news');
    }
}
