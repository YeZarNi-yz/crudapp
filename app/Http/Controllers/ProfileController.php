<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
  // Show the edit profile page
  public function edit()
  {
    return view('profile.edit');
  }

  // Update the profile
  public function update(Request $request)
  {
    $user = Auth::user();

    // Validate the request
    $validated = $request->validate([
      'name' => 'required|string|max:255',
      'email' => 'required|email|max:255|unique:users,email,' . $user->id,
      'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Update user details
    $user->name = $validated['name'];
    $user->email = $validated['email'];

    // Handle profile picture upload if present
    if ($request->hasFile('profile_pic')) {
      // Delete old profile picture if exists
      if ($user->profile_pic && file_exists(public_path('images/profile_pics/' . $user->profile_pic))) {
        unlink(public_path('images/profile_pics/' . $user->profile_pic));
      }

      // Upload new profile picture
      $profilePic = $request->file('profile_pic');
      $filename = time() . '.' . $profilePic->getClientOriginalExtension();
      $profilePic->move(public_path('images/profile_pics'), $filename);

      // Update profile picture in database
      $user->profile_pic = $filename;
    }

    // Save the updated user details
    $user->save();

    return redirect()->route('profile.edit')->with('success', 'Profile updated successfully.');
  }
}
