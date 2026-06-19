@extends('layouts.dashboard')

@section('dashboard_content')
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
@endsection
