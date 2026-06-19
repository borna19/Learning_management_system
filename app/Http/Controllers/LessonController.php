<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LessonController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(Course $course)
    {
        return view('admin.lessons.create', compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Course $course)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'video_url' => 'nullable|url', // Assuming simple URL for now, could be file upload
            'pdf' => 'nullable|mimes:pdf|max:10000', // 10MB max
            'duration' => 'nullable|string',
        ]);

        if ($request->hasFile('pdf')) {
            $path = $request->file('pdf')->store('pdfs', 'public');
            $validatedData['pdf_url'] = $path;
        }

        $validatedData['course_id'] = $course->id;

        Lesson::create($validatedData);

        return redirect()->route('admin.courses.show', $course)->with('success', 'Lesson added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course, Lesson $lesson)
    {
        return view('admin.lessons.edit', compact('course', 'lesson'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course, Lesson $lesson)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'video_url' => 'nullable|url',
            'pdf' => 'nullable|mimes:pdf|max:10000',
            'duration' => 'nullable|string',
        ]);

        if ($request->hasFile('pdf')) {
            if ($lesson->pdf_url) {
                Storage::disk('public')->delete($lesson->pdf_url);
            }
            $path = $request->file('pdf')->store('pdfs', 'public');
            $validatedData['pdf_url'] = $path;
        }

        $lesson->update($validatedData);

        return redirect()->route('admin.courses.show', $course)->with('success', 'Lesson updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course, Lesson $lesson)
    {
        if ($lesson->pdf_url) {
            Storage::disk('public')->delete($lesson->pdf_url);
        }

        $lesson->delete();

        return redirect()->route('admin.courses.show', $course)->with('success', 'Lesson deleted successfully.');
    }
}
