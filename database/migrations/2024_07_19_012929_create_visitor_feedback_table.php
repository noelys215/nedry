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
        Schema::create('visitor_feedback', function (Blueprint $table) {
            $table->id();
            $table->string('visitor_name');
            $table->string('email')->nullable();
            $table->text('feedback');
            $table->integer('rating');
            $table->string('type'); // e.g., Attraction, Park, Souvenir Shop, Overall Experience
            $table->foreignId('reference_id')->nullable()->constrained('locations'); // ID of the attraction, park, or shop being rated
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitor_feedback');
    }
};
