<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_records', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_id');
            $table->integer('d1lar')->default(0);
            $table->integer('d1dar')->default(0);
            $table->integer('d2lar')->default(0);
            $table->integer('d2dar')->default(0);
            $table->integer('driver_remaining')->default(0);
            $table->string('added_by');
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
        Schema::dropIfExists('food_records');
    }
}
