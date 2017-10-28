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
        Schema::create(config('digitalseraph-pages.pages_table'), function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('sub_title');
            $table->text('body');
            $table->boolean('active');
            $table->integer('parent_id')->unsigned()->nullable();
            $table->integer('priority')->default(0);
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('modified_by')->unsigned()->nullable();
            $table->timestamps();


            $table->foreign('created_by')
                ->references(config('digitalseraph-pages.admin_users_table_primary_key'))
                ->on(config('digitalseraph-pages.admin_users_table'))
                ->onDelete('cascade');

            $table->foreign('modified_by')
                ->references(config('digitalseraph-pages.admin_users_table_primary_key'))
                ->on(config('digitalseraph-pages.admin_users_table'))
                ->onDelete('cascade');

            $table->foreign('parent_id')
                ->references(config('digitalseraph-pages.pages_table_primary_key'))
                ->on(config('digitalseraph-pages.pages_table'))
                ->onDelete('cascade');

            $table->index('title');
            $table->index('active');
            $table->index('parent_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(config('digitalseraph-pages.pages_table'));
    }
}
