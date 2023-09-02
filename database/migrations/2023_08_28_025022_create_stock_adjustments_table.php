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
        Schema::create('stock_adjustments', function (Blueprint $table) {
            $table->id();
            $table->string('reference_number');
            $table->string('action');
            $table->unsignedBigInteger('product_id');
            $table->string('remarks');
            $table->integer('quantity');
            $table->unsignedBigInteger('user');
            $table->timestamps();
        });

        // Define foreign key relationship outside the create method
        Schema::table('stock_adjustments', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_adjustments');
    }
};
