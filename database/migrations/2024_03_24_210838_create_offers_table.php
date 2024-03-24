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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->foreignId("sender_id")->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId("receiver_id")->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('property_id')->constrained('properties')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('request_id')->constrained('tenant_requests')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('parent_id')->nullable()->constrained('offers')->cascadeOnUpdate()->nullOnDelete();
            $table->json('budget');
            $table->string('status')->default('default');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
