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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->json('description');
            $table->json('meta_data');
            $table->string('slug_en')->index();
            $table->string('slug_ar')->index();
            $table->json('price');
            $table->foreignId('location_id')->references('id')->on('locations')
                ->cascadeOnUpdate();
            $table->foreignId('user_id')->references('id')->on('users')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->boolean('active')->comment('ex: Active, In Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
