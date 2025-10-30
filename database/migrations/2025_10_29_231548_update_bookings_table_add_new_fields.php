<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            // Add new columns
            $table->dateTime('start_datetime')->nullable()->after('room_id');
            $table->dateTime('end_datetime')->nullable()->after('start_datetime');
            $table->string('event_name')->nullable()->after('end_datetime');
            $table->text('description')->nullable()->after('event_name');
            $table->integer('number_of_guests')->nullable()->after('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn([
                'start_datetime',
                'end_datetime',
                'event_name',
                'description',
                'number_of_guests',
            ]);
        });
    }
};
