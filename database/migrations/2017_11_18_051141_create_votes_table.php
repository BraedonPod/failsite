<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('article_id')->index();
            $table->integer('vote')->default(0);
            $table->integer('vote1')->default(0);
            $table->integer('smile1')->default(0);
            $table->integer('smile2')->default(0);
            $table->integer('smile3')->default(0);
            $table->integer('smile4')->default(0);
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
        Schema::dropIfExists('votes');
    }
}
