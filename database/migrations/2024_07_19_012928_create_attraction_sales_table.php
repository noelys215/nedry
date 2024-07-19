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
        Schema::create('attraction_sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('attraction_id')->constrained('attractions');
            $table->date('date');
            $table->integer('quantity');
            $table->decimal('total_revenue', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attraction_sales');
    }
};
