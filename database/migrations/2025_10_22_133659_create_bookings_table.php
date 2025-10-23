<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('room_id')->constrained()->cascadeOnUpdate()->restrictOnDelete();

            $table->dateTime('start_time');
            $table->dateTime('end_time');

            $table->decimal('price_total', 12, 2)->default(0);
            $table->enum('status', ['PENDING','PAID','CANCELLED'])->default('PENDING');
            $table->text('note')->nullable();

            $table->timestamps();

            // Index untuk query availability/listing
            $table->index(['room_id', 'start_time']);
            $table->index(['room_id', 'end_time']);
            $table->index(['status']);
        });
    }
    public function down(): void {
        Schema::dropIfExists('bookings');
    }
};
