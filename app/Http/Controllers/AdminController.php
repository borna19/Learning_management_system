<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use App\Models\Payment;
use App\Models\Lesson;
use App\Models\Enrollment; // Import Enrollment model
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $users = User::latest()->take(5)->get();
        $totalUsers = User::count();
        $coursesCount = Course::count();

        try {
            $totalEarnings = Payment::where('status', 'success')->sum('amount');
        } catch (\Exception $e) {
            $totalEarnings = 0;
        }

        return view('admin.dashboard', compact('users', 'totalUsers', 'coursesCount', 'totalEarnings'));
    }

    public function instructors()
    {
        return view('admin.instructors.index');
    }

    public function lessons()
    {
        $lessons = Lesson::with('course')->latest()->paginate(15);
        return view('admin.lessons.index', compact('lessons'));
    }

    public function categories()
    {
        return view('admin.categories.index');
    }

    public function enrollments()
    {
        $enrollments = Enrollment::with(['user', 'course'])->latest()->paginate(15);
        return view('admin.enrollments.index', compact('enrollments'));
    }

    public function certificates()
    {
        return view('admin.certificates.index');
    }

    public function reviews()
    {
        return view('admin.reviews.index');
    }

    public function reports()
    {
        return view('admin.reports.index');
    }

    public function settings()
    {
        return view('admin.settings.index');
    }
}
