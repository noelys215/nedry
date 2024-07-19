<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dinosaurs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('species');
            $table->integer('age');
            $table->string('health_status');
            $table->foreignId('location_id')->constrained('locations');
            $table->enum('threat_level', ['Low', 'Moderate', 'Substantial', 'Severe', 'Critical']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dinosaurs');
    }
};
