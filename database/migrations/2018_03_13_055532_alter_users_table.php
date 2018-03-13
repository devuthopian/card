<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->tinyInteger('provider_id')->comment('1 for facebook, 2 for twitter, 3 for google')->nullable()->after('password');
            $table->string('profile_link')->nullable()->after('provider_id');
            $table->tinyInteger('is_profile_approved')->nullable()->after('profile_link');
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
