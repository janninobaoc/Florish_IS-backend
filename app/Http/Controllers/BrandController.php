<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Managers\BrandManager;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BrandController extends Controller
{
    protected $brandManager;

    public function __construct(BrandManager $brandManager)
    {
        $this->brandManager = $brandManager;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = $this->brandManager->getAllBrands();

        return response()->json(['brands' => $brands], Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request)
    {
        $brandData = $request->all();

        $this->brandManager->createBrand($brandData);

        return response()->json(['message' => 'Brand created successfully'], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $brand = $this->brandManager->getBrandById($id);

        if (!$brand) {
            return response()->json(['message' => 'Brand not found'], Response::HTTP_NOT_FOUND);
        }

        return response()->json(['brand' => $brand], Response::HTTP_OK);
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
    public function update(BrandRequest $request, Brand $brand)
    {
        $this->brandManager->updateBrand($brand, $request->validated());

        return response()->json(['message' => 'Brand updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::findOrFail($id);

        $this->brandManager->deleteBrand($brand);

        return response()->json(['message' => 'Brand deleted successfully']);
    }
}
