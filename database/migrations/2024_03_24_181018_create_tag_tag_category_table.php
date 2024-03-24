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
        Schema::create('tag_tag_category', function (Blueprint $table) {
            $table->foreignId('tag_id')->references('id')->on('tags')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('tag_category_id')->references('id')->on('tag_categories')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tag_tag_category');
    }
};
