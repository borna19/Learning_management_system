@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Edit Lesson: {{ $lesson->title }}</h1>
    <p class="text-muted">For Course: {{ $course->title }}</p>

    <form action="{{ route('admin.courses.lessons.update', [$course, $lesson]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Lesson Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $lesson->title }}" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content / Description</label>
            <textarea class="form-control" id="content" name="content" rows="5" required>{{ $lesson->content }}</textarea>
        </div>

        <div class="mb-3">
            <label for="video_url" class="form-label">Video URL (YouTube/Vimeo)</label>
            <input type="url" class="form-control" id="video_url" name="video_url" value="{{ $lesson->video_url }}" placeholder="https://youtube.com/...">
        </div>

        <div class="mb-3">
            <label for="pdf" class="form-label">Upload PDF (Current: {{ $lesson->pdf_url ? 'Yes' : 'No' }})</label>
            <input type="file" class="form-control" id="pdf" name="pdf" accept=".pdf">
        </div>

        <div class="mb-3">
            <label for="duration" class="form-label">Duration (e.g., 10:30)</label>
            <input type="text" class="form-control" id="duration" name="duration" value="{{ $lesson->duration }}" placeholder="HH:MM:SS">
        </div>

        <button type="submit" class="btn btn-success">Update Lesson</button>
        <a href="{{ route('admin.courses.show', $course) }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
