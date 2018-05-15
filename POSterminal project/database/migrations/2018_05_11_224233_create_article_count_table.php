<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleCountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articleCount', function (Blueprint $table) {
            $table->unsignedInteger('article_id')->length(11);
            $table->unsignedInteger('country_id')->length(11);
            $table->foreign('article_id')->references('id')->on('articles');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->integer('count')->length(11);
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
        Schema::dropIfExists('articleCount');
    }
}
