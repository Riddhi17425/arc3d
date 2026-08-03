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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('banner_title')->unique();
            $table->string('banner_subtitle')->nullable();
            $table->enum('banner_status', ['Active', 'In-Active']);
            $table->string('banner_image')->nullable();
            $table->string('banner_button_text')->nullable();
            $table->string('banner_offer_text')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
