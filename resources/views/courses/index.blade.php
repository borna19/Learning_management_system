@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Our Courses</h1>
    <div class="row">
        @forelse($courses as $course)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0 hover-lift">
                    @if($course->thumbnail)
                        @if(Str::startsWith($course->thumbnail, 'http'))
                            <img src="{{ $course->thumbnail }}" class="card-img-top" alt="{{ $course->title }}" style="height: 200px; object-fit: cover;">
                        @else
                            <img src="{{ Storage::url($course->thumbnail) }}" class="card-img-top" alt="{{ $course->title }}" style="height: 200px; object-fit: cover;">
                        @endif
                    @else
                        <div class="bg-light text-center py-5" style="height: 200px;">No Image</div>
                    @endif
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <span class="badge bg-primary">{{ $course->category }}</span>
                            <span class="fw-bold text-success">₹{{ number_format($course->price, 2) }}</span>
                        </div>
                        <h5 class="card-title">{{ $course->title }}</h5>
                        <p class="card-text text-muted">{{ Str::limit($course->description, 100) }}</p>
                    </div>
                    <div class="card-footer bg-white border-top-0">
                        <a href="{{ route('courses.show', $course) }}" class="btn btn-outline-primary w-100">View Details</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">No courses available at the moment.</div>
            </div>
        @endforelse
    </div>
</div>
@endsection
