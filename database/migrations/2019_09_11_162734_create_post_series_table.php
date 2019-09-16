<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_post_series', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('blog_post_series_post', function (Blueprint $table) {
            $table->unsignedBigInteger('post_series_id');
            $table->unsignedBigInteger('post_id');
            $table->integer('order');
            $table->unique(['post_series_id', 'post_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_post_series');
        Schema::dropIfExists('blog_post_series_post');
    }
}
