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
            $table->tinyInteger('is_card_name')->nullable()->after('user_profile_id');
            $table->tinyInteger('is_bonus')->nullable()->after('image');
            $table->tinyInteger('is_card_value')->nullable()->after('bonus');
            $table->tinyInteger('is_type_name')->nullable()->after('card_value');
            $table->tinyInteger('is_tier_name')->nullable()->after('type_name_id');
            $table->tinyInteger('is_rewards')->nullable()->after('tier_name_id');
            $table->tinyInteger('is_description')->nullable()->after('card_name');
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
