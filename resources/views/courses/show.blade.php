@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <!-- Course Details -->
        <div class="col-md-8">
            <h1 class="mb-3">{{ $course->title }}</h1>

            @if($course->thumbnail)
                @if(Str::startsWith($course->thumbnail, 'http'))
                    <img src="{{ $course->thumbnail }}" class="img-fluid rounded mb-4 w-100" alt="{{ $course->title }}" style="max-height: 400px; object-fit: cover;">
                @else
                    <img src="{{ Storage::url($course->thumbnail) }}" class="img-fluid rounded mb-4 w-100" alt="{{ $course->title }}" style="max-height: 400px; object-fit: cover;">
                @endif
            @else
                <div class="bg-light p-5 text-center mb-4 rounded">No Thumbnail Available</div>
            @endif

            <h3>Description</h3>
            <div class="mb-4">
                {!! nl2br(e($course->description)) !!}
            </div>

            <h3>Curriculum</h3>
            <div class="list-group">
                @forelse($course->lessons as $lesson)
                    @php
                        $isEnrolled = auth()->check() && auth()->user()->courses->contains($course->id);
                        $canAccess = $isEnrolled || auth()->user()?->role === 'admin';
                    @endphp

                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <i class="bi bi-play-circle me-2"></i> {{ $lesson->title }}
                            <small class="text-muted ms-2">({{ $lesson->duration ?? 'N/A' }})</small>
                        </div>

                        @if($canAccess)
                            @if($lesson->video_url)
                                <a href="{{ $lesson->video_url }}" target="_blank" class="btn btn-sm btn-outline-primary">Watch</a>
                            @endif
                        @else
                            <span class="text-muted"><i class="bi bi-lock-fill"></i> Locked</span>
                        @endif
                    </div>
                @empty
                    <div class="alert alert-info">No lessons added yet.</div>
                @endforelse
            </div>
        </div>

        <!-- Sidebar / Enrollment Card -->
        <div class="col-md-4">
            <div class="card shadow-sm sticky-top" style="top: 20px;">
                <div class="card-body">
                    <h3 class="card-title text-success mb-3">₹{{ number_format($course->price, 2) }}</h3>

                    <ul class="list-unstyled mb-4">
                        <li class="mb-2"><i class="bi bi-bar-chart"></i> <strong>Level:</strong> {{ ucfirst($course->level) }}</li>
                        <li class="mb-2"><i class="bi bi-folder"></i> <strong>Category:</strong> {{ $course->category }}</li>
                        <li class="mb-2"><i class="bi bi-book"></i> <strong>Lessons:</strong> {{ $course->lessons->count() }}</li>
                    </ul>

                    @auth
                        @if(auth()->user()->role === 'admin')
                             <a href="{{ route('admin.courses.edit', $course) }}" class="btn btn-warning w-100 mb-2">Edit Course</a>
                        @elseif(auth()->user()->courses->contains($course->id))
                            <div class="alert alert-success text-center mb-3">
                                <i class="bi bi-check-circle-fill"></i> You are Enrolled
                            </div>
                            <a href="{{ route('dashboard') }}" class="btn btn-primary w-100">Go to Dashboard</a>
                        @else
                            <a href="{{ route('courses.enroll', $course) }}" class="btn btn-success w-100 btn-lg">Enroll Now</a>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary w-100 mb-2">Login to Enroll</a>
                        <a href="{{ route('register') }}" class="btn btn-outline-secondary w-100">Register Now</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
