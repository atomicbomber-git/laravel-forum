<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThreadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('threads', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("poster_id")->unsigned()->nullable();

            $table->string("title");
            $table->text("content");
            $table->boolean("is_active")->default(1);

            $table->foreign("poster_id")
                ->references("id")->on("users")
                ->onDelete("set null");

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
        Schema::dropIfExists('threads');
    }
}
