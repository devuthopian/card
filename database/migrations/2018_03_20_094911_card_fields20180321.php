<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CardFields20180321 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_field', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->timestamps();
            $table->integer('card_id')->unsigned();
            $table->string('card_name', 255);   // Reference National Motor Freight Traffic Association are from 2 - 4 characters
            $table->string('card_description', 1000);
            $table->string('card_bonus', 255);
            $table->string('card_number', 255);
            $table->boolean('is_disable');
            $table->string('card_gender', 255);
            $table->string('card_tier', 255);
            $table->text('card_rewards', 255);
            
            //Created by and updated by fields
            $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->unsigned();

            // Foreign keys
            $table->foreign('card_id')->references('id')->on('card');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('card_field');
    }
}
