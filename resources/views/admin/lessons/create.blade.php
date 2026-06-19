@extends('layouts.admin_dashboard')

@section('admin_content')
<div class="container-fluid p-0">
    <h3 class="fw-bold mb-4">Add New Lesson to: <span class="text-primary">{{ $course->title }}</span></h3>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form action="{{ route('admin.courses.lessons.store', $course) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Lesson Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Content / Description</label>
                    <textarea class="form-control" id="content" name="content" rows="5" required></textarea>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="video_url" class="form-label">Video URL (YouTube/Vimeo)</label>
                            <input type="url" class="form-control" id="video_url" name="video_url" placeholder="https://youtube.com/...">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="duration" class="form-label">Duration (e.g., 10:30)</label>
                            <input type="text" class="form-control" id="duration" name="duration" placeholder="HH:MM:SS">
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="pdf" class="form-label">Upload PDF Notes (Optional)</label>
                    <input type="file" class="form-control" id="pdf" name="pdf" accept=".pdf">
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Add Lesson</button>
                    <a href="{{ route('admin.courses.show', $course) }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
