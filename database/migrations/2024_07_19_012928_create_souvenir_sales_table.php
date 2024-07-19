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
        Schema::create('souvenir_sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shop_id')->constrained('souvenir_shops');
            $table->string('item');
            $table->decimal('price', 10, 2);
            $table->integer('quantity');
            $table->decimal('total_revenue', 10, 2);
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('souvenir_sales');
    }
};
