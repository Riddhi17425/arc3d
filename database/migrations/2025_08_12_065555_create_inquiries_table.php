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
        Schema::create('inquiries', function (Blueprint $table) {
            $table->id();
            $table->string('purpose_of_inquiry')->nullbale();
            $table->string('full_name')->nullbale();
            $table->string('mobile_number')->nullbale();
            $table->string('email')->nullbale();
            $table->string('company_name')->nullbale();
            $table->text('interested_machines')->nullbale();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inquiries');
    }
};
