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
            $table->string('title',256);
            $table->longText('subtitle');
            $table->string('slug',100);
            $table->longText('body');
            $table->longText('keywords');
            $table->boolean('status')->nullable()->default('0');
            $table->boolean('featured')->nullable()->default('0');
            $table->string('image')->nullable();
            $table->string('feature_image')->nullable();
            $table->string('meta_author')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
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
