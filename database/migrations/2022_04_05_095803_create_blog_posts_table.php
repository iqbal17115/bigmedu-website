<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('blog_user_id')->nullable();
            $table->longText('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('image')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0=Pending,1=Approved');
            $table->foreign('category_id')->references('id')->on('post_categories')->onDelete('cascade');
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
        Schema::dropIfExists('blog_posts');
    }
}
