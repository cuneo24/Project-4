<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectUsersAndMods extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mods', function (Blueprint $table) {
            # Add a new bigint field called `section_id` that has to be unsigned
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mods', function (Blueprint $table) {
            # combine tablename + fk field name + the word "foreign"
            $table->dropForeign('mods_user_id_foreign');

            $table->dropColumn('user_id');
        });
    }
}
