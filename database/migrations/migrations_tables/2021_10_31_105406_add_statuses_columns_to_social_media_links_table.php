<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusesColumnsToSocialMediaLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('social_media_links', function (Blueprint $table) {
            $table->tinyInteger('facebook_status')->nullable()->after('facebook_link');
            $table->tinyInteger('twitter_status')->nullable()->after('twitter_link');
            $table->tinyInteger('instagram_status')->nullable()->after('instagram_link');
            $table->tinyInteger('linkedin_status')->nullable()->after('linkedin_link');
            $table->tinyInteger('youtube_status')->nullable()->after('youtube_link');
            $table->tinyInteger('whatsapp_status')->nullable()->after('whatsapp_link');
            $table->tinyInteger('pinterest_status')->nullable()->after('pinterest_link');
            $table->tinyInteger('mail_status')->nullable()->after('mail_link');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('social_media_links', function (Blueprint $table) {
            $table->dropColumn('facebook_status');
            $table->dropColumn('twitter_status');
            $table->dropColumn('instagram_status');
            $table->dropColumn('linkedin_status');
            $table->dropColumn('youtube_status');
            $table->dropColumn('whatsapp_status');
            $table->dropColumn('pinterest_status');
            $table->dropColumn('mail_status');
        });
    }
}
