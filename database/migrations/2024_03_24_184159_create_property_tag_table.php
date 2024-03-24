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
        Schema::create('property_tag', function (Blueprint $table) {
            $table->foreignId('property_id')->references('id')->on('properties')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('tag_id')->references('id')->on('tags')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->string('type')->comment('ex: Main, Child');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_tag');
    }
};
