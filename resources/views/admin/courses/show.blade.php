@extends('layouts.admin_dashboard')

@section('admin_content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold mb-0">Course Details</h3>
    <div>
        <a href="{{ route('admin.courses.edit', $course) }}" class="btn btn-warning text-white"><i class="bi bi-pencil"></i> Edit</a>
        <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Back</a>
    </div>
</div>

<div class="card border-0 shadow-sm mb-4">
    <div class="card-body p-4">
        <div class="row">
            <div class="col-md-4">
                @if($course->thumbnail)
                    @if(Str::startsWith($course->thumbnail, 'http'))
                        <img src="{{ $course->thumbnail }}" alt="Thumbnail" class="img-fluid rounded mb-3 shadow-sm w-100">
                    @else
                        <img src="{{ Storage::url($course->thumbnail) }}" alt="Thumbnail" class="img-fluid rounded mb-3 shadow-sm w-100">
                    @endif
                @else
                    <div class="bg-light p-5 text-center mb-3 rounded border">No Thumbnail</div>
                @endif

                <div class="card bg-light border-0">
                    <div class="card-body">
                        <h6 class="fw-bold">Course Info</h6>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2 d-flex justify-content-between">
                                <span class="text-muted">Category:</span>
                                <span class="fw-bold">{{ $course->category }}</span>
                            </li>
                            <li class="mb-2 d-flex justify-content-between">
                                <span class="text-muted">Price:</span>
                                <span class="fw-bold text-success">₹{{ number_format($course->price, 2) }}</span>
                            </li>
                            <li class="mb-2 d-flex justify-content-between">
                                <span class="text-muted">Level:</span>
                                <span class="fw-bold">{{ ucfirst($course->level) }}</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <span class="text-muted">Status:</span>
                                <span class="badge {{ $course->status === 'published' ? 'bg-success' : 'bg-secondary' }}">{{ ucfirst($course->status) }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <h4 class="fw-bold mb-3">{{ $course->title }}</h4>
                <div class="text-muted mb-4">
                    {!! nl2br(e($course->description)) !!}
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3 mt-5 border-bottom pb-2">
                    <h5 class="fw-bold mb-0">Lessons</h5>
                    <a href="{{ route('admin.courses.lessons.create', $course) }}" class="btn btn-sm btn-success"><i class="bi bi-plus-lg"></i> Add Lesson</a>
                </div>

                @if($course->lessons->count() > 0)
                    <div class="list-group list-group-flush">
                        @foreach($course->lessons as $lesson)
                            <div class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <div>
                                    <h6 class="mb-1 fw-bold">{{ $lesson->title }}</h6>
                                    <small class="text-muted">
                                        <i class="bi bi-clock"></i> {{ $lesson->duration ?? 'N/A' }}
                                        @if($lesson->video_url)
                                            <span class="ms-2 badge bg-light text-dark border">Video</span>
                                        @endif
                                        @if($lesson->pdf_url)
                                            <span class="ms-1 badge bg-light text-dark border">PDF</span>
                                        @endif
                                    </small>
                                </div>
                                <div class="btn-group">
                                    <a href="{{ route('admin.courses.lessons.edit', [$course, $lesson]) }}" class="btn btn-sm btn-outline-warning" title="Edit"><i class="bi bi-pencil"></i></a>
                                    <form action="{{ route('admin.courses.lessons.destroy', [$course, $lesson]) }}" method="POST" onsubmit="return confirm('Delete this lesson?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger rounded-0 rounded-end" title="Delete"><i class="bi bi-trash"></i></button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="alert alert-info border-0"><i class="bi bi-info-circle me-2"></i> No lessons added yet.</div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
