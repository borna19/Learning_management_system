<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $enrolledCourses = $user->courses;
        return view('dashboard.index', compact('user', 'enrolledCourses'));
    }

    public function courses()
    {
        $user = Auth::user();
        $enrolledCourses = $user->courses;
        return view('dashboard.courses', compact('user', 'enrolledCourses'));
    }

    public function completed()
    {
        // Placeholder for completed courses logic
        return view('dashboard.completed');
    }

    public function certificates()
    {
        // Placeholder for certificates logic
        return view('dashboard.certificates');
    }

    public function feedback()
    {
        return view('dashboard.feedback');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
        ]);

        $user = Auth::user();

        if ($request->hasFile('profile_photo')) {
            // Delete old photo if exists
            if ($user->profile_photo_path) {
                Storage::disk('public')->delete($user->profile_photo_path);
            }

            $path = $request->file('profile_photo')->store('profile-photos', 'public');
            $user->profile_photo_path = $path;
        }

        $user->name = $request->name;
        $user->save();

        return back()->with('success', 'Profile updated successfully.');
    }
}
