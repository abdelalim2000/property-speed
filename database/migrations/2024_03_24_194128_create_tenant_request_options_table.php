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
        Schema::create('tenant_request_options', function (Blueprint $table) {
            $table->foreignId('tenant_request_id')->constrained('tenant_requests')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('option_id')->constrained('options')->cascadeOnUpdate()->cascadeOnDelete();
            $table->json('values');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenant_request_options');
    }
};
