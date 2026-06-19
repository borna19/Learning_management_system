<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf; // Import PDF Facade

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::with(['user', 'course'])->latest()->get();
        $users = User::where('role', 'user')->get(); // Get only students
        $courses = Course::where('status', 'published')->get();

        return view('admin.certificates.index', compact('certificates', 'users', 'courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'course_id' => 'required|exists:courses,id',
        ]);

        // Check if a certificate already exists for this user and course
        $exists = Certificate::where('user_id', $request->user_id)
                               ->where('course_id', $request->course_id)
                               ->exists();

        if ($exists) {
            return back()->with('error', 'A certificate already exists for this user and course.');
        }

        Certificate::create([
            'user_id' => $request->user_id,
            'course_id' => $request->course_id,
            'certificate_code' => 'LMS-' . strtoupper(Str::random(10)),
            'issue_date' => now(),
        ]);

        return back()->with('success', 'Certificate generated successfully!');
    }

    public function show(Certificate $certificate)
    {
        $pdf = Pdf::loadView('admin.certificates.pdf', compact('certificate'))
                  ->setPaper('a4', 'landscape');

        return $pdf->stream('certificate-' . $certificate->certificate_code . '.pdf');
    }

    public function destroy(Certificate $certificate)
    {
        $certificate->delete();
        return back()->with('success', 'Certificate deleted successfully.');
    }
}
