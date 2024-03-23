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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('title', 50)->nullable()->comment('ex: Mr, Mrs, Doctor, etc...');
            $table->string('username', 50)->unique();
            $table->string('email', 255)->unique();
            $table->timestamp('email_verified_at')->nullable()->comment('Check if email is verified or not');
            $table->string('password')->nullable();
            $table->string('phone_number', 20);
            $table->string('image_url', 255)->default('user/default-avatar.png');
            $table->string('gender', 3)->default('M');
            $table->date('birthday')->nullable();
            $table->string('material_status',1)->nullable()->comment('ex: M, S, W');
            $table->string('nationality')->nullable();
            $table->string('provider', 20)->comment('ex: FACEBOOK, GOOGLE, TWITTER')->nullable();
            $table->string('provider_id', 255)->nullable()->comment('The id from the provider');
            $table->string('type')->default('user')->comment('ex: user, broker, agent');
            $table->boolean('ban')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
