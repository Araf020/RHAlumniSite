<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempRegFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_reg_forms', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->string('order_id', 100);
            $table->string('order_status', 100);
            $table->string('currency', 100)->default('BDT');
            $table->text('nick_name');
            $table->text('department');
            $table->text('exam_session')->nullable();
            $table->text('graduation_year');
            $table->text('attachment');
            $table->text('room_no')->nullable();
            $table->text('hall_duration')->nullable();
            $table->text('birthdate')->nullable();
            $table->text('gender');
            $table->text('present_address');
            $table->text('hobby')->nullable();
            $table->text('postcode');
            $table->text('mobile_1');
            $table->text('mobile_2')->nullable();
            $table->text('email');
            $table->text('occupation');
            $table->text('position');
            $table->text('organization')->nullable();
            $table->text('spouse_name')->nullable();
            $table->text('spouse_profession')->nullable();
            $table->text('t_shirt');
            $table->integer('d1la');
            $table->integer('d1da');
            $table->integer('d2la')->nullable();
            $table->integer('d2da')->nullable();
            $table->integer('driver');
            $table->decimal('total_amount', 8, 2);
            $table->text('payment_method');
            $table->text('added_by')->nullable();
            $table->text('image')->nullable();
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
        Schema::dropIfExists('temp_reg_forms');
    }
}
