<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordUpdateRequest;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthUserController extends Controller
{
    public function profile()
    {
        return view('user.profile');
    }


    public function updateProfile(ProfileUpdateRequest $request)
    {
        $validated = $request->validated();

        $user = Auth::user();
        $user->update($validated);

        return redirect()->route('profile');
    }

    public function updatePassword(PasswordUpdateRequest $request)
    {
        $validated = $request->validated();

        $user = Auth::user();
        $user->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('success', 'Password updated successfully!');
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect()->route('home');
    }
}
