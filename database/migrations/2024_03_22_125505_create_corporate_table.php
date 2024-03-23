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
        Schema::create('corporate', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->string('commercial_register_number');
            $table->string('tax_card_number');
            $table->string('logo');
            $table->string('address');
            $table->string('website')->nullable();
            $table->json('social')->nullable()->comment('structure: {provider, icon, url, active}');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('corporate');
    }
};
