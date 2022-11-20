<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersTableAddBirthdateEtc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->date('user_birthdate')->nullable()->after('email');
            $table->string('user_phone')->nullable()->after('user_birthdate');
            $table->string('user_gender')->nullable()->after('user_phone');
            $table->string('user_vaccine')->nullable()->after('user_gender');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('user_birthdate');
            $table->dropColumn('user_phone');
            $table->dropColumn('user_gender');
            $table->dropColumn('user_vaccine');
        });
    }
}
