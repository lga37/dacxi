<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->id();

            $table->date('data');
            $table->string('coin');
            $table->string('curr');

            $table->decimal('current_price',20,8,true);
            $table->decimal('market_cap',24,8,true);
            $table->decimal('total_volume',24,8,true);

            $table->integer('facebook_likes')->nullable();
            $table->integer('twitter_followers')->nullable();
            $table->integer('reddit_average_posts_48h')->nullable();
            $table->integer('reddit_average_comments_48h')->nullable();
            $table->integer('reddit_subscribers')->nullable();

            $table->integer('forks')->nullable();
            $table->integer('stars')->nullable();
            $table->integer('subscribers')->nullable();
            $table->integer('total_issues')->nullable();
            $table->integer('closed_issues')->nullable();
            $table->integer('pull_requests_merged')->nullable();
            $table->integer('pull_request_contributors')->nullable();
            
            $table->integer('alexa_rank')->nullable();

            $table->timestamps();
            $table->unique(['data','coin','curr']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('histories');
    }
};
