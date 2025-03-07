<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogPostViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_post_views', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("blog_post_id");
            $table->string("session_id");
            $table->unsignedBigInteger('blog_user_id')->nullable();
            $table->bigInteger("number_of_view");
            $table->string("ip");
            $table->string("agent");
            $table->foreign('blog_post_id')->references('id')->on('blog_posts')->onDelete('cascade');
            $table->foreign('blog_user_id')->references('id')->on('blog_users')->onDelete('cascade');
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
        Schema::dropIfExists('blog_post_views');
    }
}
