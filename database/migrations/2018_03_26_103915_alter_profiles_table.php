<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_profiles', function (Blueprint $table) {
            $table->string('cover_image')->nullable()->after('profile_image');
            $table->string('profile_background_image')->nullable()->after('cover_image');
            $table->string('title_color',10)->nullable()->after('profile_image');
            $table->string('description_color',10)->nullable()->after('cover_image');
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
