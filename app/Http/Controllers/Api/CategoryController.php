<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json(Category::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //p
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $category = Category::query()->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'description' => $request->description,
            'image' => $request->image
        ]);

        return response()->json($category);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        return response()->json(Category::query()->find($id));
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
    public function update(Request $request, string $id): JsonResponse
    {
        $category = Category::query()->findOrFail($id);

        $category->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'description' => $request->description,
            'image' => $request->image
        ]);

        return response()->json($category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $category = Category::query()->findOrFail($id);
        $category->delete();

        return response()->json(['message' => 'Category deleted successfully']);
    }
}
