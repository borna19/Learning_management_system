@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <!-- Sidebar Navigation -->
        <div class="col-lg-3">
            <div class="card shadow-sm border-0 rounded-3 position-sticky" style="top: 80px;">
                <div class="card-body text-center py-4">
                    <div class="mb-3">
                        <div class="bg-danger text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px; font-size: 2rem;">
                            {{ substr(auth()->user()->name, 0, 1) }}
                        </div>
                    </div>
                    <h5 class="fw-bold mb-0">Admin Panel</h5>
                    <p class="text-muted small">{{ auth()->user()->email }}</p>
                </div>
                <div class="list-group list-group-flush">
                    <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action border-0 py-3 {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="bi bi-speedometer2 me-2"></i> Dashboard
                    </a>

                    <a href="{{ route('admin.users.index') }}" class="list-group-item list-group-item-action border-0 py-3 {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                        <i class="bi bi-people me-2"></i> Users
                    </a>

                    <a href="{{ route('admin.instructors.index') }}" class="list-group-item list-group-item-action border-0 py-3 {{ request()->routeIs('admin.instructors.*') ? 'active' : '' }}">
                        <i class="bi bi-person-badge me-2"></i> Instructors
                    </a>

                    <a href="{{ route('admin.courses.index') }}" class="list-group-item list-group-item-action border-0 py-3 {{ request()->routeIs('admin.courses.*') ? 'active' : '' }}">
                        <i class="bi bi-book me-2"></i> Courses
                    </a>

                    <a href="{{ route('admin.lessons.index') }}" class="list-group-item list-group-item-action border-0 py-3 {{ request()->routeIs('admin.lessons.*') ? 'active' : '' }}">
                        <i class="bi bi-journal-text me-2"></i> Lessons
                    </a>

                    <a href="{{ route('admin.categories.index') }}" class="list-group-item list-group-item-action border-0 py-3 {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                        <i class="bi bi-tags me-2"></i> Categories
                    </a>

                    <a href="{{ route('admin.enrollments.index') }}" class="list-group-item list-group-item-action border-0 py-3 {{ request()->routeIs('admin.enrollments.*') ? 'active' : '' }}">
                        <i class="bi bi-cart-check me-2"></i> Enrollments
                    </a>

                    <a href="{{ route('admin.certificates.index') }}" class="list-group-item list-group-item-action border-0 py-3 {{ request()->routeIs('admin.certificates.*') ? 'active' : '' }}">
                        <i class="bi bi-award me-2"></i> Certificates
                    </a>

                    <a href="{{ route('admin.reviews.index') }}" class="list-group-item list-group-item-action border-0 py-3 {{ request()->routeIs('admin.reviews.*') ? 'active' : '' }}">
                        <i class="bi bi-star me-2"></i> Reviews
                    </a>

                    <a href="{{ route('admin.reports.index') }}" class="list-group-item list-group-item-action border-0 py-3 {{ request()->routeIs('admin.reports.*') ? 'active' : '' }}">
                        <i class="bi bi-bar-chart me-2"></i> Reports
                    </a>

                    <a href="{{ route('admin.settings.index') }}" class="list-group-item list-group-item-action border-0 py-3 {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                        <i class="bi bi-gear me-2"></i> Settings
                    </a>

                    <form method="POST" action="{{ route('logout') }}" class="d-grid p-2 mt-2">
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
            @yield('admin_content')
        </div>
    </div>
</div>
@endsection
