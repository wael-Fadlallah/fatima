<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Result extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('result', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('shift');
            $table->bigInteger('lavel_id');
            $table->bigInteger('year_id');
            $table->bigInteger('class_id');
            $table->bigInteger('semester');
            $table->timestamps();
        });

        Schema::create('result_degrees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('result_id');
            $table->bigInteger('student_id');
            $table->bigInteger('degree');
            $table->string('subjects');
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
        //
    }
}
