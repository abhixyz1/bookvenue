<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('floor_id')->constrained()->cascadeOnUpdate()->restrictOnDelete();
            $table->string('name');                 // "Aula Utama", "R. Rapat 301"
            $table->integer('capacity')->default(0);
            $table->string('type')->nullable();     // hall|meeting|auditorium|lab
            $table->json('facilities')->nullable(); // ["ac","projector","sound","wifi"]
            $table->decimal('price_hour', 10, 2)->default(0);
            $table->decimal('price_day', 10, 2)->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->index(['type']);
            $table->index(['capacity']);
            $table->unique(['floor_id','name']); // nama ruang unik per lantai
        });
    }
    public function down(): void {
        Schema::dropIfExists('rooms');
    }
};
