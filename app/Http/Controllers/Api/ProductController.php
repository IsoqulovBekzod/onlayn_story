<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json(Product::all());
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
    public function store(Request $request): JsonResponse
    {
        $product = Product::query()->create([
            'name' => $request['name'],
            'description' => $request['description'],
            'price' => $request['price'],
            'category_id' => $request['category_id'],
            'user_id' => $request['user_id'],
        ]);

        return response()->json($product);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product): Product
    {
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return Product::query()->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $product = Product::query()->findOrFail($id);

        $product->update([
            'name' => $request['name'],
            'description' => $request['description'],
            'price' => $request['price'],
            'category_id' => $request['category_id'],
            'user_id' => $request['user_id'],
        ]);

        return response()->json('Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $product = Product::query()->findOrFail($id);

        $product->delete();
        return response()->json('Product successfully deleted');
    }
}
