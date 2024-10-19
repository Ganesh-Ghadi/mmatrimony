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
        Schema::create('profile_packages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_id')->constrained()->nullable(); // Assuming you have a users table
            $table->foreignId('package_id')->constrained()->nullable(); // Link to packages
            $table->integer('tokens_received')->default(0);
            $table->integer('tokens_used')->default(0);
            $table->timestamp('starts_at'); // When the package was bought
            $table->timestamp('expires_at'); // When the package will expire
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_packages');
    }
};