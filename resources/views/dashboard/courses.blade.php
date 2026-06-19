@extends('layouts.dashboard')

@section('dashboard_content')
<h3 class="fw-bold mb-4">My Enrolled Courses</h3>
<div class="row row-cols-1 row-cols-md-2 g-4">
    @forelse($enrolledCourses as $course)
        <div class="col">
            <div class="card h-100 border-0 shadow-sm">
                @if($course->thumbnail)
                    <img src="{{ Storage::url($course->thumbnail) }}" class="card-img-top" alt="..." style="height: 160px; object-fit: cover;">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $course->title }}</h5>
                    <p class="card-text text-muted small">{{ Str::limit($course->description, 60) }}</p>
                    <div class="progress mb-2" style="height: 5px;">
                        <div class="progress-bar bg-success" style="width: 10%"></div>
                    </div>
                    <div class="d-flex justify-content-between small text-muted">
                        <span>{{ $course->lessons->count() }} Lessons</span>
                        <span>Running</span>
                    </div>
                </div>
                <div class="card-footer bg-white border-top-0 pt-0">
                    <a href="{{ route('courses.show', $course) }}" class="btn btn-outline-primary w-100">Go to Course</a>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="text-center py-5">
                <i class="bi bi-journal-x fs-1 text-muted"></i>
                <p class="mt-3">No courses found.</p>
                <a href="{{ route('courses.index') }}" class="btn btn-primary">Browse Courses</a>
            </div>
        </div>
    @endforelse
</div>
@endsection
