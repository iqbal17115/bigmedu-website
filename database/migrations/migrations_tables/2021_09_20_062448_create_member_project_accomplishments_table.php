<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberProjectAccomplishmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_project_accomplishments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('member_id')->nullable();
            $table->string('project_title')->nullable();
            $table->longText('project_url_link')->nullable();
            $table->string('project_from_month')->nullable();
            $table->string('project_from_year')->nullable();
            $table->string('project_to_month')->nullable();
            $table->string('project_to_year')->nullable();
            $table->longText('project_description')->nullable();
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
        Schema::dropIfExists('member_project_accomplishments');
    }
}
