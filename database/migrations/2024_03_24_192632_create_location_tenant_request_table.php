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
        Schema::create('location_tenant_request', function (Blueprint $table) {
            $table->foreignId('location_id')->constrained('locations')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('tenant_request')->constrained('tenant_requests')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('location_tenant_request');
    }
};
