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
        Schema::create('derivatives', function (Blueprint $table) {
            $table->id();

            $table->string('slug'); #vai slugar de market
            $table->string('market');

            $table->string('symbol');
            $table->string('index_id');

            $table->decimal('price',14,6)->nullable();
            $table->decimal('price_percentage_change_24h',22,10)->nullable();
            $table->string('contract_type')->nullable();
            $table->decimal('index',22,10)->nullable();
            $table->decimal('basis',22,10)->nullable();
            $table->decimal('spread',22,10)->nullable();
            $table->decimal('funding_rate',22,10)->nullable();
            $table->decimal('open_interest',22,10)->nullable();
            $table->decimal('volume_24h',22,10)->nullable();
            $table->integer('last_traded_at')->nullable();
            $table->integer('expired_at')->nullable();

            $table->timestamps();

            $table->unique(['slug','symbol']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('derivatives');
    }
};
