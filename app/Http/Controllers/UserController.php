<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json(['users' => $users]);
    }

    public function create()
    {
        // Since this is a form rendering method, it won't return JSON.
        // You can keep it as is for rendering a view.
        return view('users.create');
    }

    public function store(Request $request)
    {
            $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'phone' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
            ]);
    
            $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'is_admin' => false,
            ]);
    
            return response()->json(['message' => 'User Created successfully'], 201);
        
    }

    public function show(User $user)
    {
        return response()->json(['user' => $user]);
    }

    public function edit(User $user)
    {
        // Since this is a form rendering method, it won't return JSON.
        // You can keep it as is for rendering a view.
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable',
        ]);

        $user->update($request->all());

        return response()->json(['message' => 'User updated successfully.', 'user' => $user]);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return response()->json(['message' => 'User deleted successfully.']);
    }

    public function enrollments(User $user)
    {
        $enrollments = $user->enrollments()->with('course')->get();
        return response()->json(['user' => $user, 'enrollments' => $enrollments]);
    }
}
