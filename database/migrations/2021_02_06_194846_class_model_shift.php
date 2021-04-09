<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ClassModelShift extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('class', function (Blueprint $table) {
            $table->bigInteger('teacher_id');
            $table->tinyInteger('shift')->default(1);
        });

        Schema::table('students', function (Blueprint $table) {
            $table->tinyInteger('shift')->default(1);
            $table->string('phone');
            $table->date('birthday');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('class', function (Blueprint $table) {
        });
    }
}
