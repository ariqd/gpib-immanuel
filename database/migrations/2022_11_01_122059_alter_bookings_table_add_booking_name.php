<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterBookingsTableAddBookingName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->string('booking_id')->nullable()->after('id');
            $table->string('booking_name')->nullable()->after('booking_seat');
            $table->boolean('fixed')->default(false)->after('booking_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn('booking_id');
            $table->dropColumn('booking_name');
            $table->dropColumn('fixed');
        });
    }
}
