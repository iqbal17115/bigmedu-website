<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memberExperiences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('member_id')->nullable();
            $table->string('designation')->nullable();
            $table->string('subject')->nullable();
            $table->string('experience_institution')->nullable();
            $table->string('experience_country')->nullable();
            $table->string('experience_from_month')->nullable();
            $table->string('experience_from_year')->nullable();
            $table->string('experience_to_month')->nullable();
            $table->string('experience_to_year')->nullable();
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
        Schema::dropIfExists('memberExperiences');
    }
}
