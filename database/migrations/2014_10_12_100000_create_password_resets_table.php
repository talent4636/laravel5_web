<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasswordResetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('password_resets', function (Blueprint $table) {
//            $table->string('email')->index();
            $table->integer('id')->index();
//            $table->string('token')->index();
            $table->timestamp('created_at');
            $table->timestamp('publish_at');
            $table->text('title');
            $table->text('content');
            $table->boolean('publish');
            $table->integer('view_count');
            $table->timestamp('last_modify');
            $table->integer('admin_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('password_resets');
    }
}
