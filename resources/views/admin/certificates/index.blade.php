@extends('layouts.admin_dashboard')

@section('admin_content')
<div class="row">
    <!-- Certificate Generator -->
    <div class="col-md-12">
        <h3 class="fw-bold mb-4">Certificate Generator</h3>
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body">
                <p class="text-muted">Select a user and a course to generate a certificate of completion.</p>
                <form action="{{ route('admin.certificates.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label class="form-label">Select User</label>
                            <select name="user_id" class="form-select" required>
                                <option value="">-- Select a User --</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-5 mb-3">
                            <label class="form-label">Select Course</label>
                            <select name="course_id" class="form-select" required>
                                <option value="">-- Select a Course --</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2 d-flex align-items-end mb-3">
                            <button type="submit" class="btn btn-primary w-100">Generate</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Issued Certificates List -->
    <div class="col-md-12">
        <h3 class="fw-bold mb-4 mt-4">Issued Certificates</h3>
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Certificate Code</th>
                                <th>Student</th>
                                <th>Course</th>
                                <th>Issue Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($certificates as $certificate)
                                <tr>
                                    <td class="fw-bold">{{ $certificate->certificate_code }}</td>
                                    <td>{{ $certificate->user->name }}</td>
                                    <td>{{ $certificate->course->title }}</td>
                                    <td>{{ \Carbon\Carbon::parse($certificate->issue_date)->format('M d, Y') }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('admin.certificates.show', $certificate) }}" target="_blank" class="btn btn-sm btn-outline-primary" title="View Certificate">View</a>
                                            <form action="{{ route('admin.certificates.destroy', $certificate) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">No certificates have been issued yet.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
