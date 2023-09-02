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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_type_id'); // Create the column
            $table->string('first_name');
            $table->string('last_name');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->integer('age');
            $table->string('address');
            $table->rememberToken();
            $table->timestamps();
        });
    
        // Define foreign key relationship outside the create method
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('user_type_id')->references('id')->on('user_types');
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
