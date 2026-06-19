@extends('layouts.dashboard')

@section('dashboard_content')
<h3 class="fw-bold mb-4">Dashboard Overview</h3>
<div class="row g-4 mb-4">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm bg-primary text-white h-100">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-white-50 text-uppercase mb-2">Enrolled</h6>
                        <h2 class="mb-0">{{ $enrolledCourses->count() }}</h2>
                    </div>
                    <div class="fs-1 text-white-50"><i class="bi bi-journal-bookmark"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm bg-success text-white h-100">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-white-50 text-uppercase mb-2">Completed</h6>
                        <h2 class="mb-0">0</h2> <!-- Placeholder -->
                    </div>
                    <div class="fs-1 text-white-50"><i class="bi bi-trophy"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm bg-warning text-white h-100">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-white-50 text-uppercase mb-2">Certificates</h6>
                        <h2 class="mb-0">0</h2> <!-- Placeholder -->
                    </div>
                    <div class="fs-1 text-white-50"><i class="bi bi-patch-check"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>

<h4 class="fw-bold mb-3">Continue Learning</h4>
@if($enrolledCourses->count() > 0)
    <div class="card border-0 shadow-sm mb-3">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div class="flex-grow-1">
                    <h5 class="mb-1">{{ $enrolledCourses->first()->title }}</h5>
                    <div class="progress" style="height: 6px;">
                        <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <small class="text-muted">25% Complete</small>
                </div>
                <a href="{{ route('courses.show', $enrolledCourses->first()) }}" class="btn btn-sm btn-primary ms-3">Resume</a>
            </div>
        </div>
    </div>
@else
    <div class="alert alert-info">You are not enrolled in any courses yet.</div>
@endif
@endsection
