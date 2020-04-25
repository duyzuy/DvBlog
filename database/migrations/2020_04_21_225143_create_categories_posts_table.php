<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_category', function (Blueprint $table) {
            $table->bigInteger('post_id')->reference('id')->on('posts')->onUpdate('cascade')->onDelete('cascade');;
            $table->bigInteger('category_id')->reference('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');;
            
        });
    }

    /**
     * Reverse the migrations
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_category');
    }
}
