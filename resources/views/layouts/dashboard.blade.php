@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <!-- Sidebar Navigation -->
        <div class="col-lg-3">
            <div class="card shadow-sm border-0 rounded-3 position-sticky" style="top: 80px;">
                <div class="card-body text-center py-4">
                    <div class="mb-3">
                        @if(auth()->user()->profile_photo_path)
                            <img src="{{ Storage::url(auth()->user()->profile_photo_path) }}" class="rounded-circle shadow-sm" alt="User Avatar" style="width: 80px; height: 80px; object-fit: cover;">
                        @else
                            <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px; font-size: 2rem;">
                                {{ substr(auth()->user()->name, 0, 1) }}
                            </div>
                        @endif
                    </div>
                    <h5 class="fw-bold mb-0">{{ auth()->user()->name }}</h5>
                    <p class="text-muted small">{{ auth()->user()->email }}</p>
                </div>
                <div class="list-group list-group-flush">
                    <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action border-0 py-3 {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="bi bi-speedometer2 me-2"></i> Dashboard
                    </a>
                    <a href="{{ route('dashboard.profile') }}" class="list-group-item list-group-item-action border-0 py-3 {{ request()->routeIs('dashboard.profile') ? 'active' : '' }}">
                        <i class="bi bi-person-circle me-2"></i> Profile Settings
                    </a>
                    <a href="{{ route('dashboard.courses') }}" class="list-group-item list-group-item-action border-0 py-3 {{ request()->routeIs('dashboard.courses') ? 'active' : '' }}">
                        <i class="bi bi-book me-2"></i> My Courses
                    </a>
                    <a href="{{ route('dashboard.completed') }}" class="list-group-item list-group-item-action border-0 py-3 {{ request()->routeIs('dashboard.completed') ? 'active' : '' }}">
                        <i class="bi bi-check-circle me-2"></i> Completed
                    </a>
                    <a href="{{ route('dashboard.certificates') }}" class="list-group-item list-group-item-action border-0 py-3 {{ request()->routeIs('dashboard.certificates') ? 'active' : '' }}">
                        <i class="bi bi-award me-2"></i> Certificates
                    </a>
                    <a href="{{ route('dashboard.feedback') }}" class="list-group-item list-group-item-action border-0 py-3 {{ request()->routeIs('dashboard.feedback') ? 'active' : '' }}">
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
            @yield('dashboard_content')
        </div>
    </div>
</div>
@endsection
