<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurrentStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('current_students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('student_id');
            $table->string('phone');
            $table->string('email');
            $table->string('allotment');
            $table->string('room_no')->nullable();
            $table->string('t_shirt');
            $table->string('gdinner_status');
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('current_students');
    }
}
