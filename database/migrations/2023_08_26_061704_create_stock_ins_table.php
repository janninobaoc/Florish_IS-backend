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
        Schema::create('stock_ins', function (Blueprint $table) {
            $table->id();
            $table->string('reference_number');
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity_added');
            $table->datetime('stock_in_date');
            $table->unsignedBigInteger('stock_in_by');
            $table->timestamps();
        });

        // Define foreign key relationship outside the create method
        Schema::table('stock_ins', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products'); 
            $table->foreign('stock_in_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_ins');
    }
};
