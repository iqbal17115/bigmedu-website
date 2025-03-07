<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberAdministrativeExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_administrative_experiences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('member_id')->nullable();
            $table->string('administrative_designation')->nullable();
            $table->longText('administrative_details')->nullable();
            $table->string('administrative_from_month')->nullable();
            $table->string('administrative_from_year')->nullable();
            $table->string('administrative_to_month')->nullable();
            $table->string('administrative_to_year')->nullable();
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
        Schema::dropIfExists('member_administrative_experiences');
    }
}
