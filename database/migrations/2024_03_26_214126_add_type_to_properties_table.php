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
        Schema::table('properties', function (Blueprint $table) {
            $table->string('type', 50)->after('meta_data')->default('internal')->comment('ex Internal, External');
            $table->string('external_link')->after('price')->nullable();
            $table->string('ref_id', 150)->after('external_link')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropColumn('type');
            $table->dropColumn('external_link');
            $table->dropColumn('ref_id');
        });
    }
};
