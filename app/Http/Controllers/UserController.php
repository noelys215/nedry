<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Fetch the authenticated user's details
    public function show(Request $request)
    {
        return response()->json($request->user());
    }

    // Update the authenticated user's details
    public function update(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $request->user()->id,
        ]);

        $user = $request->user();
        $user->update($request->only('first_name', 'last_name', 'email'));

        return response()->json(['message' => 'User updated successfully']);
    }
}
