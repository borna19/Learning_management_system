@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<header class="py-5 mb-4 d-flex align-items-center" style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1521737604893-d14cc237f11d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80'); background-size: cover; background-position: center; height: 300px;">
  <div class="container text-center">
    <h1 class="fw-bold text-white display-4">About Us</h1>
    <p class="lead text-white-50">Dedicated to transforming lives through education.</p>
  </div>
</header>

<!-- Our Story Section -->
<div class="container py-5">
    <div class="row align-items-center">
        <div class="col-lg-6">
            <h2 class="fw-bold mb-4">Our Story</h2>
            <p class="text-muted mb-4 lead">
                Founded in 2024, our platform started with a simple idea: that everyone should have access to high-quality education, regardless of their background or location.
            </p>
            <p class="text-muted">
                What began as a small collection of coding tutorials has grown into a comprehensive learning management system serving thousands of students worldwide. We believe that learning is a lifelong journey. Our mission is to empower individuals to reach their full potential by providing them with the tools, resources, and community support they need to succeed in today's fast-paced world.
            </p>
        </div>
        <div class="col-lg-6">
            <img class="img-fluid rounded-3 shadow-lg" src="https://images.unsplash.com/photo-1531482615713-2afd69097998?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Team Collaboration">
        </div>
    </div>
</div>

<!-- Core Values Section -->
<section class="bg-light py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Our Core Values</h2>
            <p class="text-muted">The principles that guide everything we do.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm text-center p-4 hover-lift">
                    <div class="feature-icon bg-primary bg-gradient text-white rounded-circle mb-3 mx-auto" style="width: 70px; height: 70px; line-height: 70px;">
                        <i class="bi bi-star-fill fs-3"></i>
                    </div>
                    <h5 class="card-title fw-bold">Excellence</h5>
                    <p class="card-text text-muted">We are committed to delivering the highest quality content and learning experiences to our students.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm text-center p-4 hover-lift">
                    <div class="feature-icon bg-success bg-gradient text-white rounded-circle mb-3 mx-auto" style="width: 70px; height: 70px; line-height: 70px;">
                        <i class="bi bi-people-fill fs-3"></i>
                    </div>
                    <h5 class="card-title fw-bold">Community</h5>
                    <p class="card-text text-muted">We foster a supportive and inclusive environment where learners can connect, share, and grow together.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm text-center p-4 hover-lift">
                    <div class="feature-icon bg-info bg-gradient text-white rounded-circle mb-3 mx-auto" style="width: 70px; height: 70px; line-height: 70px;">
                        <i class="bi bi-lightbulb-fill fs-3"></i>
                    </div>
                    <h5 class="card-title fw-bold">Innovation</h5>
                    <p class="card-text text-muted">We constantly explore new ways to improve learning through technology, creativity, and data-driven insights.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold">Meet Our Team</h2>
        <p class="text-muted">The passionate individuals behind our platform.</p>
    </div>
    <div class="row g-4 justify-content-center">
        <!-- Team Member 1 -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100 text-center">
                <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" class="card-img-top" alt="Sarah Johnson" style="height: 300px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title mb-1 fw-bold">Sarah Johnson</h5>
                    <div class="card-text text-primary small text-uppercase fw-bold">CEO & Founder</div>
                </div>
            </div>
        </div>
        <!-- Team Member 2 -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100 text-center">
                <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" class="card-img-top" alt="David Lee" style="height: 300px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title mb-1 fw-bold">David Lee</h5>
                    <div class="card-text text-primary small text-uppercase fw-bold">CTO</div>
                </div>
            </div>
        </div>
        <!-- Team Member 3 -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100 text-center">
                <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" class="card-img-top" alt="Emily Davis" style="height: 300px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title mb-1 fw-bold">Emily Davis</h5>
                    <div class="card-text text-primary small text-uppercase fw-bold">Head of Content</div>
                </div>
            </div>
        </div>
        <!-- Team Member 4 -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow-sm h-100 text-center">
                <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" class="card-img-top" alt="Michael Brown" style="height: 300px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title mb-1 fw-bold">Michael Brown</h5>
                    <div class="card-text text-primary small text-uppercase fw-bold">Lead Developer</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
