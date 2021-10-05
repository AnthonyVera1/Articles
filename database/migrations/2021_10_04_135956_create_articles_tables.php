<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->string('description')->nullable();
            $table->longText('content');
            $table->unsignedInteger('user_id')->index()->nullable();
            $table->timestamps();
        });

        Schema::create('categories', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
        });

        Schema::create('articles_categories', function(Blueprint $table) {
            $table->unsignedInteger('article_id')->index();
            $table->unsignedInteger('category_id')->index();
        });

        Schema::table('articles', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });

        Schema::table('articles_categories', function(Blueprint $table) {
            $table->foreign('article_id')->references('id')->on('articles');
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles_tables');
    }
}
