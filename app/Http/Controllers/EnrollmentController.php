<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    public function store(Course $course)
    {
        if (Auth::user()->role === 'admin') {
             return back()->with('error', 'Admins cannot enroll in courses.');
        }

        // Check if already enrolled
        if (Auth::user()->courses->contains($course->id)) {
            return back()->with('info', 'You are already enrolled in this course.');
        }

        Auth::user()->courses()->attach($course->id);

        return redirect()->route('courses.show', $course)->with('success', 'You have successfully enrolled in this course!');
    }
}
