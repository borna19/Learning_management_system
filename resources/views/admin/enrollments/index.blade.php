@extends('layouts.admin_dashboard')

@section('admin_content')
<h3 class="fw-bold mb-4">Enrollment Management</h3>
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Student</th>
                        <th>Course</th>
                        <th>Enrolled At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($enrollments as $enrollment)
                        <tr>
                            <td>{{ $enrollment->user->name ?? 'N/A' }}</td>
                            <td>{{ $enrollment->course->title ?? 'N/A' }}</td>
                            <td>{{ $enrollment->created_at->format('M d, Y') }}</td>
                            <td>
                                <button class="btn btn-sm btn-outline-danger" disabled>Unenroll</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">No enrollments found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            {{ $enrollments->links() }}
        </div>
    </div>
</div>
@endsection
