<?php

namespace Database\Seeders;

use App\Models\ProductType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductType::create([
            'id' => ProductType::PRODUCT_TYPE_FOR_CONVENIENCE,
            'product_type' => 'For Convenience',
        ]);

        ProductType::create([
            'id' => ProductType::PRODUCT_TYPE_FOR_REFILLING,
            'product_type' => 'For Refilling',
        ]);

        ProductType::create([
            'id' => ProductType::PRODUCT_TYPE_FOR_PASTRY,
            'product_type' => 'For Pastry',
        ]);
    }
}
