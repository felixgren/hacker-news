<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTitleAndLinkToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->text('title')->nullable();
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->text('title')->nullable(false)->change();;
            $table->text('body')->nullable()->change();
            $table->text('link')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->text('body')->nullable(false)->change();
            $table->dropColumn('link');
        });
    }
}
