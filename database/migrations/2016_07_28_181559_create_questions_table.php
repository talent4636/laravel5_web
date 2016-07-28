<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('language_type');
            $table->integer('score');
            $table->text('content');
            $table->text('answer');
            $table->enum('question_type',[
                'select',//单选
                'muti_select',//多选
                'fill',//填空
                'answer',//简答
                'code',//编程
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('questions');
    }
}
