@extends('layouts.dashboard')

@section('dashboard_content')
<h3 class="fw-bold mb-4">Profile Settings</h3>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card border-0 shadow-sm">
    <div class="card-body p-4">
        <form action="{{ route('dashboard.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row mb-4">
                <div class="col-md-3 text-center">
                    <div class="mb-3">
                        @if(auth()->user()->profile_photo_path)
                            <img src="{{ Storage::url(auth()->user()->profile_photo_path) }}" class="rounded-circle shadow-sm" alt="Profile Photo" style="width: 150px; height: 150px; object-fit: cover;">
                        @else
                            <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center shadow-sm" style="width: 150px; height: 150px; font-size: 4rem;">
                                {{ substr(auth()->user()->name, 0, 1) }}
                            </div>
                        @endif
                    </div>
                    <label for="profile_photo" class="btn btn-outline-primary btn-sm">
                        <i class="bi bi-camera"></i> Change Photo
                    </label>
                    <input type="file" id="profile_photo" name="profile_photo" class="d-none" onchange="this.form.submit()">
                </div>
                <div class="col-md-9">
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" value="{{ auth()->user()->email }}" disabled>
                        <div class="form-text">Email cannot be changed.</div>
                    </div>

                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
