<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('floors', function (Blueprint $table) {
            $table->id();
            $table->integer('number'); 
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['number']);
        });
    }
    public function down(): void {
        Schema::dropIfExists('floors');
    }
};
