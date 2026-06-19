@extends('layouts.app')

@section('content')
<style>
    /* Import Google Font */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');

    /* Custom CSS Variables */
    :root {
        --primary-color: #6f42c1;
        --secondary-color: #0d6efd;
        --dark-blue: #1e293b;
        --light-gray: #f8f9fa;
        --text-color: #333;
    }

    body {
        font-family: 'Poppins', sans-serif;
        color: var(--text-color);
    }

    .hover-lift {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .hover-lift:hover {
        transform: translateY(-10px);
        box-shadow: 0 1rem 3rem rgba(0,0,0,.175)!important;
    }

    .gradient-text {
        background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
</style>

<!-- Hero Section -->
<header class="py-5" style="background: linear-gradient(45deg, #111827, #1e293b);">
    <div class="container px-5 text-center text-white">
        <div class="row gx-5 align-items-center justify-content-center">
            <div class="col-lg-8 col-xl-7 col-xxl-6">
                <div class="my-5">
                    <h1 class="display-4 fw-bolder mb-3">Build Your Future, One Skill at a Time.</h1>
                    <p class="lead fw-normal text-white-50 mb-4">Join thousands of learners mastering new skills in technology, business, and creative arts with our expert-led online courses.</p>
                    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                        <a class="btn btn-primary btn-lg px-4 me-sm-3 fw-bold" href="{{ route('courses.index') }}">Explore Courses</a>
                        <a class="btn btn-outline-light btn-lg px-4" href="#demo-class">Watch a Demo</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Animated Counter Section -->
<section class="py-5 bg-light">
    <div class="container px-5">
        <div class="row gx-5">
            <div class="col-lg-3 col-md-6 text-center mb-4">
                <i class="bi bi-people-fill fs-1 text-primary"></i>
                <h2 class="fw-bolder mt-3 counter" data-target="12000">0</h2>
                <p class="text-muted">Happy Students</p>
            </div>
            <div class="col-lg-3 col-md-6 text-center mb-4">
                <i class="bi bi-journal-check fs-1 text-success"></i>
                <h2 class="fw-bolder mt-3 counter" data-target="850">0</h2>
                <p class="text-muted">Courses Published</p>
            </div>
            <div class="col-lg-3 col-md-6 text-center mb-4">
                <i class="bi bi-camera-video-fill fs-1 text-info"></i>
                <h2 class="fw-bolder mt-3 counter" data-target="25000">0</h2>
                <p class="text-muted">Hours of Content</p>
            </div>
            <div class="col-lg-3 col-md-6 text-center mb-4">
                <i class="bi bi-person-video3 fs-1 text-warning"></i>
                <h2 class="fw-bolder mt-3 counter" data-target="300">0</h2>
                <p class="text-muted">Expert Instructors</p>
            </div>
        </div>
    </div>
</section>

<!-- About Us Summary Section -->
<section class="py-5">
    <div class="container px-5">
        <div class="row gx-5 align-items-center">
            <div class="col-lg-6">
                <img src="https://images.unsplash.com/photo-1531482615713-2afd69097998?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="img-fluid rounded-3 shadow-lg" alt="About Us">
            </div>
            <div class="col-lg-6">
                <h2 class="fw-bolder">About Our Platform</h2>
                <p class="lead fw-normal text-muted mb-4">We believe education should be accessible to everyone. Our mission is to provide high-quality, affordable, and flexible online learning that empowers individuals to achieve their personal and professional goals.</p>
                <a href="{{ route('about') }}" class="btn btn-outline-primary">Learn More About Us</a>
            </div>
        </div>
    </div>
</section>

<!-- How It Works Section -->
<section class="py-5 bg-light">
    <div class="container px-5 my-5">
        <div class="text-center mb-5">
            <h2 class="fw-bolder">Start Learning in 3 Easy Steps</h2>
            <p class="lead fw-normal text-muted">A seamless journey from curiosity to mastery.</p>
        </div>
        <div class="row gx-5">
            <div class="col-lg-4 text-center p-4">
                <div class="p-4 rounded-circle bg-primary text-white d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                    <span class="fw-bold fs-2">1</span>
                </div>
                <h4 class="fw-bold">Create an Account</h4>
                <p class="text-muted">Sign up for free and get instant access to our community and resources.</p>
            </div>
            <div class="col-lg-4 text-center p-4">
                <div class="p-4 rounded-circle bg-success text-white d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                    <span class="fw-bold fs-2">2</span>
                </div>
                <h4 class="fw-bold">Find Your Course</h4>
                <p class="text-muted">Browse our extensive library of courses and find the one that fits your goals.</p>
            </div>
            <div class="col-lg-4 text-center p-4">
                <div class="p-4 rounded-circle bg-info text-white d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                    <span class="fw-bold fs-2">3</span>
                </div>
                <h4 class="fw-bold">Start Learning</h4>
                <p class="text-muted">Begin your learning journey with expert-led videos, quizzes, and hands-on projects.</p>
            </div>
        </div>
    </div>
</section>

<!-- Featured Courses Section -->
<section class="py-5" id="courses">
    <div class="container px-5 my-5">
        <div class="text-center mb-5">
            <h2 class="fw-bolder">Featured Courses</h2>
            <p class="lead fw-normal text-muted mb-0">Handpicked courses to kickstart your journey.</p>
        </div>
        <div class="row gx-5 justify-content-center">
            <!-- Course Cards -->
            <div class="col-lg-4 col-md-6 mb-5">
                <div class="card h-100 shadow border-0 hover-lift">
                    <img class="card-img-top" src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Web Development" style="height: 200px; object-fit: cover;" />
                    <div class="card-body p-4">
                        <div class="badge bg-primary bg-gradient rounded-pill mb-2">Web Development</div>
                        <a class="text-decoration-none link-dark stretched-link" href="{{ route('courses.index') }}"><h5 class="card-title mb-3">Full Stack Web Developer</h5></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5">
                <div class="card h-100 shadow border-0 hover-lift">
                    <img class="card-img-top" src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Data Science" style="height: 200px; object-fit: cover;" />
                    <div class="card-body p-4">
                        <div class="badge bg-success bg-gradient rounded-pill mb-2">Data Science</div>
                        <a class="text-decoration-none link-dark stretched-link" href="{{ route('courses.index') }}"><h5 class="card-title mb-3">Python for Data Analysis</h5></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5">
                <div class="card h-100 shadow border-0 hover-lift">
                    <img class="card-img-top" src="https://images.unsplash.com/photo-1561070791-2526d30994b5?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Design" style="height: 200px; object-fit: cover;" />
                    <div class="card-body p-4">
                        <div class="badge bg-info bg-gradient rounded-pill mb-2 text-white">Design</div>
                        <a class="text-decoration-none link-dark stretched-link" href="{{ route('courses.index') }}"><h5 class="card-title mb-3">UI/UX Design Masterclass</h5></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
            <a class="btn btn-primary btn-lg" href="{{ route('courses.index') }}">View All Courses</a>
        </div>
    </div>
</section>

<!-- Become an Instructor Section -->
<section class="py-5 bg-light">
    <div class="container px-5">
        <div class="row gx-5 align-items-center">
            <div class="col-lg-6">
                <h2 class="fw-bolder">Become an Instructor</h2>
                <p class="lead fw-normal text-muted mb-4">Share your knowledge with thousands of students and earn money. We provide the tools and support to help you create amazing courses.</p>
                <a href="#" class="btn btn-primary btn-lg">Start Teaching Today</a>
            </div>
            <div class="col-lg-6 text-center">
                <img src="https://images.unsplash.com/photo-1543269865-cbf427effbad?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" class="img-fluid rounded-3 shadow-lg mt-4 mt-lg-0" alt="Instructor">
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-5">
    <div class="container px-5 my-5">
        <div class="text-center mb-5">
            <h2 class="fw-bolder">Frequently Asked Questions</h2>
            <p class="lead fw-normal text-muted">Answers to our most common questions.</p>
        </div>
        <div class="accordion" id="faqAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                        Are the courses self-paced?
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Yes! All of our courses are 100% self-paced. You can start, pause, and resume your courses anytime you like. You have lifetime access to all purchased courses.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                        Do I get a certificate upon completion?
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Absolutely. Upon successful completion of any course, you will receive a verifiable certificate that you can share on your LinkedIn profile, resume, or with your employer.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                        What if I'm not satisfied with a course?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        We offer a 30-day money-back guarantee on all courses. If you're not completely satisfied with your purchase, you can request a full refund, no questions asked.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Final Call to Action -->
<section class="py-5" style="background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));">
    <div class="container px-5 text-center">
        <h2 class="display-5 fw-bolder text-white">Start Your Learning Journey Today</h2>
        <a class="btn btn-light btn-lg px-4 fw-bold text-primary mt-3" href="{{ route('register') }}">Sign Up for Free</a>
    </div>
</section>

<!-- JavaScript for Counter -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    const counters = document.querySelectorAll('.counter');
    const speed = 200;

    const animateCounter = (counter) => {
        const target = +counter.getAttribute('data-target');
        const count = +counter.innerText;
        const inc = target / speed;

        if (count < target) {
            counter.innerText = Math.ceil(count + inc);
            setTimeout(() => animateCounter(counter), 1);
        } else {
            counter.innerText = target.toLocaleString();
        }
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounter(entry.target);
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });

    counters.forEach(counter => {
        observer.observe(counter);
    });
});
</script>
@endsection
