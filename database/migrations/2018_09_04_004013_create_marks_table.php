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
            $table->string('sub_name');
            $table->float('task_1',6,2);
            $table->float('mse_1',6,2);
            $table->float('task_2',6,2);
            $table->float('mse_2',6,2);
            $table->float('task_3',6,2);
            $table->float('see',6,2);
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
