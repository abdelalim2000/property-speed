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
        Schema::create('franchise', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->string('commercial_register_number');
            $table->string('logo');
            $table->string('address');
            $table->foreignId('corporate_id')->references('id')->on('corporate')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('manager_id')->nullable()->references('id')->on('users')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('franchise');
    }
};
