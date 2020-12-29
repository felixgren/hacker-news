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
            $table->id(); // Creates autoincrement primary ;key ID
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // ForeignId alias for unsignedBigInt, constrained finds referenced table & column by name convention or specified. On constraint deletion (user_id) remove all posts.
            $table->text('body'); // Create text column called body
            $table->timestamps(); // Creates the created_at & updated_at columns
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
