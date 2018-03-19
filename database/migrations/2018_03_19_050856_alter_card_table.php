<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('card', function (Blueprint $table) {
            $table->string('bonus')->nullable()->after('image');
            $table->string('card_number')->nullable()->after('bonus');
            $table->string('gender')->nullable()->after('card_number');
            $table->string('card_tier')->nullable()->after('gender');
            $table->longText('rewards')->nullable()->after('card_tier');
            $table->string('mask_image')->nullable()->after('rewards');
            $table->string('card_background')->nullable()->after('mask_image');
            $table->string('theme_color')->nullable()->after('card_background');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
