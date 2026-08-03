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
        Schema::create('inquiry_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inquiry_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->string('name')->nullable();
            $table->string('quantity')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inquiry_products');
    }
};
