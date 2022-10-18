<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaveChangesByAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('save_changes_by_admins', function (Blueprint $table) {
            $table->increments('id');
            $table->text('admin_name');
            $table->text('order_id');
            $table->text('old_data');
            $table->text('new_data');
            $table->text('comment');
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
        Schema::dropIfExists('save_changes_by_admins');
    }
}
