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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_code', 10);
            $table->string('barcode', 20);
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->integer('reorder_level');
            $table->integer('stock_on_hand');
            $table->unsignedBigInteger('product_type_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id');
            $table->timestamps();
        });
        // Define foreign key relationship outside the create method
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('product_type_id')->references('id')->on('product_types');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('brand_id')->references('id')->on('brands');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
