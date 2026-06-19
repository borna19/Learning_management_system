@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<header class="bg-primary text-white text-center py-5 mb-4">
  <div class="container">
    <h1 class="fw-light text-white">Contact Us</h1>
    <p class="lead text-white-50">We'd love to hear from you. Get in touch with us today.</p>
  </div>
</header>

<div class="container py-5">
    <div class="row gx-5">
        <!-- Contact Form -->
        <div class="col-lg-7 mb-5 mb-lg-0">
            <h2 class="fw-bold mb-4">Send us a Message</h2>
            <form action="{{ route('contact.submit') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="col-12">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" class="form-control" id="subject" name="subject" required>
                    </div>
                    <div class="col-12">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary px-4">Send Message</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Contact Info -->
        <div class="col-lg-5">
            <h2 class="fw-bold mb-4">Contact Information</h2>
            <p class="text-muted mb-4">
                Have questions about our courses or need technical support? Reach out to us through any of the channels below.
            </p>

            <div class="d-flex mb-4">
                <div class="flex-shrink-0 btn-square bg-primary bg-gradient text-white rounded-circle text-center me-3" style="width: 50px; height: 50px; line-height: 50px;">
                    <i class="bi bi-geo-alt-fill fs-5"></i>
                </div>
                <div>
                    <h5 class="fw-bold mb-1">Our Location</h5>
                    <p class="text-muted mb-0">123 Education Lane, Tech City, CA 94043</p>
                </div>
            </div>

            <div class="d-flex mb-4">
                <div class="flex-shrink-0 btn-square bg-primary bg-gradient text-white rounded-circle text-center me-3" style="width: 50px; height: 50px; line-height: 50px;">
                    <i class="bi bi-telephone-fill fs-5"></i>
                </div>
                <div>
                    <h5 class="fw-bold mb-1">Phone Number</h5>
                    <p class="text-muted mb-0">+1 (555) 123-4567</p>
                </div>
            </div>

            <div class="d-flex mb-4">
                <div class="flex-shrink-0 btn-square bg-primary bg-gradient text-white rounded-circle text-center me-3" style="width: 50px; height: 50px; line-height: 50px;">
                    <i class="bi bi-envelope-fill fs-5"></i>
                </div>
                <div>
                    <h5 class="fw-bold mb-1">Email Address</h5>
                    <p class="text-muted mb-0">support@learningms.com</p>
                </div>
            </div>

            <!-- Map Placeholder -->
            <div class="ratio ratio-16x9 mt-4 rounded overflow-hidden shadow-sm">
                 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3168.639290621062!2d-122.08624618469227!3d37.421999879825215!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fba02425dad8f%3A0x6c296c66619367e0!2sGoogleplex!5e0!3m2!1sen!2sus!4v1616616421008!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
</div>
@endsection
