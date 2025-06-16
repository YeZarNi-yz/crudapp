<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
  public function manage()
  {
    if (Auth::user()->role != 'admin') {
      return redirect()->route('home')->with('error', 'You do not have permission to manage users.');
    }


    $users = User::all();
    return view('users.manage', compact('users'));
  }


  public function edit(User $user)
  {
    return view('users.edit', compact('user'));
  }

  public function update(Request $request, User $user)
  {
    if (Auth::user()->id == $user->id && $request->role == 'user' && Auth::user()->role == 'admin') {
      return redirect()->route('home')->with('error', 'Admins cannot demote themselves.');
    }

    $request->validate([
      'name' => 'required|string|max:255',
      'email' => 'required|email|unique:users,email,' . $user->id,
      'role' => 'required|string',
    ]);

    $user->update($request->only(['name', 'email', 'role']));

    return redirect()->route('home')->with('status', 'User updated successfully!');
  }

  public function destroy(User $user)
  {
    $user->delete();
    return redirect()->route('home')->with('status', 'User deleted successfully!');
  }

  public function create()
  {
    return view('users.create');
  }
  public function store(Request $request)
  {
    $validated = $request->validate([
      'name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users',
      'role' => 'required|in:user,admin',
      'password' => 'required|string|min:8|confirmed',   // You can add more roles if needed
    ]);

    User::create([
      'name' => $validated['name'],
      'email' => $validated['email'],
      'role' => $validated['role'],
      'password' => bcrypt($validated['password']),
    ]);

    return redirect()->route('home')->with('status', 'User created successfully');
  }
}
