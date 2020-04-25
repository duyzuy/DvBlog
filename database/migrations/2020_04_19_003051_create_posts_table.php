<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('post_title');
            $table->string('post_slug')->unique();
            $table->bigInteger('author_id')->unsigned(); // the author_id column just same bigIntefer with table users when using foreign ky
            $table->text('post_excerpt');
            $table->longText('post_content');
            $table->string('post_status', 10)->default('publish');
            $table->string('post_type', 10)->default('post');
            $table->timestamps();
            $table->bigInteger('comment_count')->unsigned()->default(0);;
            $table->string('comment_status', 10)->default('open');
            $table->bigInteger('post_parent')->unsigned();
            $table->dateTime('published_at');
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
