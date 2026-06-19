@extends('layouts.app')

@section('content')
<div class="container-fluid py-5 bg-light">
    <div class="container">
        <div class="row">
            <!-- Sidebar Navigation -->
            <div class="col-lg-3 mb-4">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-body text-center py-4">
                        <div class="mb-3">
                            <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px; font-size: 2rem;">
                                {{ substr(auth()->user()->name, 0, 1) }}
                            </div>
                        </div>
                        <h5 class="fw-bold mb-0">{{ auth()->user()->name }}</h5>
                        <p class="text-muted small">{{ auth()->user()->email }}</p>
                    </div>
                    <div class="list-group list-group-flush" id="dashboardTab" role="tablist">
                        <a class="list-group-item list-group-item-action active border-0 py-3" id="overview-tab" data-bs-toggle="pill" href="#overview" role="tab">
                            <i class="bi bi-speedometer2 me-2"></i> Dashboard
                        </a>
                        <a class="list-group-item list-group-item-action border-0 py-3" id="courses-tab" data-bs-toggle="pill" href="#courses" role="tab">
                            <i class="bi bi-book me-2"></i> My Courses <span class="badge bg-primary rounded-pill float-end">{{ $enrolledCourses->count() }}</span>
                        </a>
                        <a class="list-group-item list-group-item-action border-0 py-3" id="completed-tab" data-bs-toggle="pill" href="#completed" role="tab">
                            <i class="bi bi-check-circle me-2"></i> Completed Courses
                        </a>
                        <a class="list-group-item list-group-item-action border-0 py-3" id="resources-tab" data-bs-toggle="pill" href="#resources" role="tab">
                            <i class="bi bi-download me-2"></i> Resources & Downloads
                        </a>
                        <a class="list-group-item list-group-item-action border-0 py-3" id="certificates-tab" data-bs-toggle="pill" href="#certificates" role="tab">
                            <i class="bi bi-award me-2"></i> Certificates
                        </a>
                        <a class="list-group-item list-group-item-action border-0 py-3" id="feedback-tab" data-bs-toggle="pill" href="#feedback" role="tab">
                            <i class="bi bi-chat-dots me-2"></i> Feedback
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="d-grid p-2">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger">
                                <i class="bi bi-box-arrow-right me-2"></i> Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="col-lg-9">
                <div class="tab-content" id="dashboardTabContent">

                    <!-- Overview Tab -->
                    <div class="tab-pane fade show active" id="overview" role="tabpanel">
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
                    </div>

                    <!-- My Courses Tab -->
                    <div class="tab-pane fade" id="courses" role="tabpanel">
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
                    </div>

                    <!-- Completed Courses Tab -->
                    <div class="tab-pane fade" id="completed" role="tabpanel">
                        <h3 class="fw-bold mb-4">Completed Courses</h3>
                        <div class="text-center py-5 bg-white rounded shadow-sm">
                            <img src="https://cdn-icons-png.flaticon.com/512/190/190411.png" width="80" class="mb-3 opacity-50" alt="Empty">
                            <h5>No Completed Courses Yet</h5>
                            <p class="text-muted">Finish your lessons to see your completed courses here.</p>
                        </div>
                    </div>

                    <!-- Resources Tab -->
                    <div class="tab-pane fade" id="resources" role="tabpanel">
                        <h3 class="fw-bold mb-4">Resources & Downloads</h3>
                        <div class="card border-0 shadow-sm">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle">
                                        <thead class="table-light">
                                            <tr>
                                                <th>File Name</th>
                                                <th>Course</th>
                                                <th>Type</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($enrolledCourses as $course)
                                                @foreach($course->lessons as $lesson)
                                                    @if($lesson->pdf_url)
                                                        <tr>
                                                            <td>{{ $lesson->title }} - Notes</td>
                                                            <td>{{ $course->title }}</td>
                                                            <td><span class="badge bg-danger">PDF</span></td>
                                                            <td>
                                                                <a href="{{ Storage::url($lesson->pdf_url) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                                                    <i class="bi bi-download"></i> Download
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @if($enrolledCourses->flatMap->lessons->whereNotNull('pdf_url')->isEmpty())
                                    <p class="text-center text-muted my-3">No downloadable resources available yet.</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Certificates Tab -->
                    <div class="tab-pane fade" id="certificates" role="tabpanel">
                        <h3 class="fw-bold mb-4">My Certificates</h3>
                        <div class="alert alert-warning border-0 shadow-sm">
                            <i class="bi bi-info-circle-fill me-2"></i> You haven't earned any certificates yet. Complete a course to earn one!
                        </div>
                        <!-- Example Certificate Card (Hidden/Placeholder) -->
                        <!--
                        <div class="card border-0 shadow-sm mb-3">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="mb-1">Web Development Bootcamp</h5>
                                    <p class="text-muted small mb-0">Issued on: Jan 10, 2024</p>
                                </div>
                                <button class="btn btn-outline-success"><i class="bi bi-download"></i> Download</button>
                            </div>
                        </div>
                        -->
                    </div>

                    <!-- Feedback Tab -->
                    <div class="tab-pane fade" id="feedback" role="tabpanel">
                        <h3 class="fw-bold mb-4">Send Feedback</h3>
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-4">
                                <p class="text-muted">We value your feedback! Let us know how we can improve your learning experience.</p>
                                <form action="{{ route('contact.submit') }}" method="POST">
                                    @csrf
                                    <!-- Hidden fields to reuse contact form logic -->
                                    <input type="hidden" name="name" value="{{ auth()->user()->name }}">
                                    <input type="hidden" name="email" value="{{ auth()->user()->email }}">

                                    <div class="mb-3">
                                        <label class="form-label">Subject</label>
                                        <select class="form-select" name="subject">
                                            <option>General Feedback</option>
                                            <option>Course Content Issue</option>
                                            <option>Technical Problem</option>
                                            <option>Feature Request</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Your Message</label>
                                        <textarea class="form-control" name="message" rows="5" required placeholder="Tell us what you think..."></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit Feedback</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
