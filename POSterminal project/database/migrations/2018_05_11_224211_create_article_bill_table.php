<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleBillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_bill', function (Blueprint $table) {
            $table->unsignedInteger('article_id')->length(11);
            $table->unsignedInteger('bill_id')->length(11);
            $table->foreign('article_id')->references('id')->on('articles');
            $table->foreign('bill_id')->references('id')->on('bills');
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
        Schema::dropIfExists('article_bill');
    }
}
