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
        Schema::create('lead_score', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->json('score');
            $table->json('responsiveness')->nullable();
            $table->json('interest')->nullable();
            $table->json('seriousness')->nullable();
            $table->json('urgency')->nullable();
            $table->json('flexible_budget_band')->nullable();
            $table->json('financial_health')->nullable();
            $table->json('past_transactions')->nullable();
            $table->json('verified_identity')->nullable();
            $table->json('assets')->nullable();
            $table->json('life_style')->nullable();
            $table->json('employment_verification')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lead_score');
    }
};
