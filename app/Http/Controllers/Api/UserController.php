<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json(User::all());
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
        $user = User::query()->create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => $request->password
        ]);

        return response()->json([
            'message' => 'User created successfully',
            'status'  => 'success',
            'token'   => $user->createToken($user->name)->plainTextToken
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        return User::query()->find($id);
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
        $user = User::query()->findOrFail($id);

        $user->update([
            'name' => $request->name,
            'email'=> $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password
        ]);

        return response()->json([
            'meessage' => 'User updated successfully',
            'status'    => 'success',
            'token'     => $user
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $user = User::query()->findOrFail($id);

        $user->delete();

        return response()->json([
            'message' => 'User deleted successfully',
            'status'  => 'success',
        ]);
    }



}
