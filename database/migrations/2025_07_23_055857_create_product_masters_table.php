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
        Schema::create('product_masters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('sub_category_id')->nullable();
            $table->string('product_name')->nullable();
            $table->string('product_code')->nullable();
            $table->string('product_short_desc')->nullable();
            $table->text('product_desc')->nullable();
            $table->string('product_color')->nullable();
            $table->string('product_size')->nullable();
            $table->string('product_brands')->nullable();
            $table->string('product_material')->nullable();
            $table->string('product_feature')->nullable();
            $table->string('product_type')->nullable();
            $table->string('package_bundle')->nullable();
            $table->string('package_parcel')->nullable();
            $table->string('product_pattern')->nullable();
            $table->enum('product_status' , ['Active', 'In-Active'])->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_masters');
    }
};
