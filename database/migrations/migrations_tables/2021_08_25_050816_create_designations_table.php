<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesignationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('designations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('designation')->nullable();
            $table->timestamps();
        });

        DB::table('designations')->insert([
            ['id' => 1, 'designation' => 'Vice-Chancellor'],
            ['id' => 2, 'designation' => 'Professor'],
            ['id' => 3, 'designation' => 'Associate Professor'],
            ['id' => 4, 'designation' => 'Assistant Professor'],
            ['id' => 5, 'designation' => 'Senior Secretary'],
            ['id' => 6, 'designation' => 'Secretary'],
            ['id' => 7, 'designation' => 'Additional Secretary'],
            ['id' => 8, 'designation' => 'Joint Secretary'],
            ['id' => 9, 'designation' => 'Deputy Secretary'],
            ['id' => 10, 'designation' => 'Former Senior Secretary'],
            ['id' => 11, 'designation' => 'Former Secretary'],
            ['id' => 12, 'designation' => 'Former Additional Secretary'],
            ['id' => 13, 'designation' => 'Former Joint Secretary'],
            ['id' => 14, 'designation' => 'Former Deputy Secretary'],
            ['id' => 15, 'designation' => 'Former Ambassador and Secretary'],
            ['id' => 16, 'designation' => 'Former Foreign Secretary'],
            ['id' => 17, 'designation' => 'Former Ambassador'],
            ['id' => 18, 'designation' => 'Former Executive Director'],
            ['id' => 19, 'designation' => 'Member Directing Staff (MDS)'],
            ['id' => 20, 'designation' => 'Director'],
            ['id' => 21, 'designation' => 'Deputy Director'],
            ['id' => 22, 'designation' => 'Assistant Director'],
            ['id' => 23, 'designation' => 'Assistant Executive Project Director'],
            ['id' => 24, 'designation' => 'Chairman'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('designations');
    }
}
