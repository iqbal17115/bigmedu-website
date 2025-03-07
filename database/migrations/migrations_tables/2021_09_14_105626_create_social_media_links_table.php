<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialMediaLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_media_links', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('facebook_link')->nullable();
            $table->longText('twitter_link')->nullable();
            $table->longText('instagram_link')->nullable();
            $table->longText('linkedin_link')->nullable();
            $table->longText('youtube_link')->nullable();
            $table->longText('whatsapp_link')->nullable();
            $table->longText('pinterest_link')->nullable();
            $table->longText('mail_link')->nullable();
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
        Schema::dropIfExists('social_media_links');
    }
}
