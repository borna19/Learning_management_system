@extends('layouts.admin_dashboard')

@section('admin_content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold mb-0">Global Lesson Management</h3>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <div class="alert alert-info border-0">
            <i class="bi bi-info-circle me-2"></i> This page shows all lessons from all courses. To add a new lesson, please go to the <strong><a href="{{ route('admin.courses.index') }}">Courses</a></strong> page, select a course, and click "Add Lesson".
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Lesson Title</th>
                        <th>Course</th>
                        <th>Duration</th>
                        <th>Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($lessons as $lesson)
                        <tr>
                            <td class="fw-bold">{{ $lesson->title }}</td>
                            <td>
                                <a href="{{ route('admin.courses.show', $lesson->course) }}" class="text-decoration-none">
                                    {{ $lesson->course->title }}
                                </a>
                            </td>
                            <td>{{ $lesson->duration ?? 'N/A' }}</td>
                            <td>
                                @if($lesson->video_url)
                                    <span class="badge bg-danger">Video</span>
                                @elseif($lesson->pdf_url)
                                    <span class="badge bg-info">PDF</span>
                                @else
                                    <span class="badge bg-secondary">Text</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.courses.lessons.edit', [$lesson->course, $lesson]) }}" class="btn btn-sm btn-outline-warning" title="Edit"><i class="bi bi-pencil"></i></a>
                                    <form action="{{ route('admin.courses.lessons.destroy', [$lesson->course, $lesson]) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete"><i class="bi bi-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">No lessons found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            {{ $lessons->links() }}
        </div>
    </div>
</div>
@endsection
