<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberSocialMediaLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_social_media_links', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('member_id')->nullable();
            $table->longText('facebook')->nullable();
            $table->longText('linkedin')->nullable();
            $table->longText('twitter')->nullable();
            $table->longText('skype')->nullable();
            $table->longText('whatsapp')->nullable();
            $table->longText('instagram')->nullable();
            $table->longText('pinterest')->nullable();
            $table->longText('google_scholar')->nullable();
            $table->longText('research_gate')->nullable();
            $table->longText('publons')->nullable();
            $table->longText('orcid')->nullable();
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
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
        Schema::dropIfExists('member_social_media_links');
    }
}
