<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('category_id')->index();
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->string('summary')->nullable();
            $table->text('body');
            $table->boolean('featured')->default(false);
            $table->timestamp('scheduled_for')->useCurrent();
            $table->string('seo_title');
            $table->text('seo_description')->nullable();
            $table->enum('content_type', ['markdown', 'editor-js'])->default('editor-js');
            $table->softDeletes();
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
        Schema::dropIfExists('blog_posts');
    }
}
