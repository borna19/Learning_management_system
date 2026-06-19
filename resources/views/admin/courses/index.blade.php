@extends('layouts.admin_dashboard')

@section('admin_content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold mb-0">Course Management</h3>
    <a href="{{ route('admin.courses.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Create New Course</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Thumbnail</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($courses as $course)
                        <tr>
                            <td>
                                @if($course->thumbnail)
                                    @if(Str::startsWith($course->thumbnail, 'http'))
                                        <img src="{{ $course->thumbnail }}" alt="Img" class="rounded" style="width: 60px; height: 40px; object-fit: cover;">
                                    @else
                                        <img src="{{ Storage::url($course->thumbnail) }}" alt="Img" class="rounded" style="width: 60px; height: 40px; object-fit: cover;">
                                    @endif
                                @else
                                    <span class="text-muted small">No Image</span>
                                @endif
                            </td>
                            <td class="fw-bold">{{ $course->title }}</td>
                            <td><span class="badge bg-light text-dark border">{{ $course->category }}</span></td>
                            <td>₹{{ number_format($course->price, 2) }}</td>
                            <td>
                                <span class="badge {{ $course->status === 'published' ? 'bg-success' : 'bg-secondary' }}">
                                    {{ ucfirst($course->status) }}
                                </span>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.courses.show', $course) }}" class="btn btn-sm btn-outline-primary" title="View"><i class="bi bi-eye"></i></a>
                                    <a href="{{ route('admin.courses.edit', $course) }}" class="btn btn-sm btn-outline-warning" title="Edit"><i class="bi bi-pencil"></i></a>
                                    <form action="{{ route('admin.courses.destroy', $course) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger rounded-0 rounded-end" title="Delete"><i class="bi bi-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
