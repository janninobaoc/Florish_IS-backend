<?php

namespace App\Managers;

use App\Models\Product;
use App\Models\StockAdjustment;
use Illuminate\Support\Facades\Auth;

class StockAdjustmentManager
{
    public function createStockAdjustment(array $stockAdjustmentData)
    {
        $stockAdjustmentData['reference_number'] = $this->generateReferenceNumber();
        $stockAdjustmentData['user'] = Auth::id(); // Set the current user's ID

        StockAdjustment::create($stockAdjustmentData);

        $product = Product::findOrFail($stockAdjustmentData['product_id']);
        if ($stockAdjustmentData['action'] === 'add') {
            $product->stock_on_hand += $stockAdjustmentData['quantity'];
        } elseif ($stockAdjustmentData['action'] === 'remove') {
            $product->stock_on_hand -= $stockAdjustmentData['quantity'];
        }

        $product->save();
    }

    public function getAllStockAdjustment()
    {
        return StockAdjustment::with(['stockAdjustmentByUser', 'adjustedProduct'])->get();
    }

    protected function generateReferenceNumber(): string
    {
        $timestamp = now()->format('YmdHis'); // Current date and time in YmdHis format
        $randomNumber = mt_rand(1000, 9999); // Generate a random 4-digit number
        return "{$timestamp}{$randomNumber}";
    }
}
