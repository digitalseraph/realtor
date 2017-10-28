<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('sub_title');
            $table->text('body');
            $table->string('link_text');
            $table->text('link_description');
            $table->boolean('active');
            $table->integer('priority')->default(0);
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('modified_by')->unsigned()->nullable();
            $table->timestamps();


            $table->foreign('created_by')
                ->references('id')
                ->on('admins')
                ->onDelete('cascade');

            $table->foreign('modified_by')
                ->references('id')
                ->on('admins')
                ->onDelete('cascade');

            $table->index('title');
            $table->index('active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
