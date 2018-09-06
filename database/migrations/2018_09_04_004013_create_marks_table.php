<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('semister_id');
            $table->string('subject_id');
            $table->float('task_1',6,2)->nullable();
            $table->float('mse_1',6,2)->nullable();
            $table->float('task_2',6,2)->nullable();
            $table->float('mse_2',6,2)->nullable();
            $table->float('task_3',6,2)->nullable();
            $table->float('see',6,2)->nullable();
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marks');
    }
}
