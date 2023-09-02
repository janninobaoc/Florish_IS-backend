<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Managers\ProductManager;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productManager;

    public function __construct(ProductManager $productManager)
    {
        $this->productManager = $productManager;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = $this->productManager->getAllProducts();

        return response()->json(['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $productTypes = ProductType::all();
        // $categories = Category::all();
        // $brands = Brand::all();

        // return view('products.create', compact('productTypes', 'categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $validatedData = $request->validated();

        // Create the product using the manager
        $product = $this->productManager->createProduct($validatedData);

        return response()->json(['message' => 'Product created successfully', 'product' => $product]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = $this->productManager->getProductByIdWithRelations($id);

        return response()->json(['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $this->productManager->updateProduct($product, $request->validated());

        return response()->json(['message' => 'Product updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        $this->productManager->deleteProduct($product);

        return response()->json(['message' => 'Product deleted successfully']);
    }

    public function getCriticalStock()
    {
        $criticalProducts = $this->productManager->getCriticalStock();

        return response()->json($criticalProducts);
    }
}
