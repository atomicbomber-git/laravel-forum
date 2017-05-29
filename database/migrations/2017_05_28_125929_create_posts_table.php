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
        Schema::create('posts', function (Blueprint $table) {

            $table->integer("thread_id")->unsigned()->nullable();
            $table->text("content");
            $table->integer("parent_post_id")->unsigned()->nullable();
            $table->integer("level")->unsigned()->default(0);
            $table->integer("poster_id")->unsigned()->nullable();

            $table->foreign("parent_post_id")
                ->references("id")->on("posts")
                ->onDelete("set null");

            $table->foreign("poster_id")
                ->references("id")->on("users")
                ->onDelete("set null");

            $table->foreign("thread_id")
                ->references("id")->on("threads")
                ->onDelete("set null");

            $table->increments('id');
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
        Schema::dropIfExists('posts');
    }
}
