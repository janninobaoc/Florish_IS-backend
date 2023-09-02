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
        Schema::create('user_credentials', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Create the column
            $table->string('username')->unique();
            $table->string('password');
            $table->timestamps();
        });
        
        // Define foreign key relationship outside the create method
        Schema::table('user_credentials', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_credentials');
    }
};
