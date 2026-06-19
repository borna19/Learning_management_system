@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Secure Checkout</h4>
                </div>
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between mb-4">
                        <div>
                            <h5>{{ $course->title }}</h5>
                            <p class="text-muted mb-0">Category: {{ $course->category }}</p>
                        </div>
                        <div class="text-end">
                            <h3 class="text-success">₹{{ number_format($course->price, 2) }}</h3>
                        </div>
                    </div>

                    <hr class="my-4">

                    <form action="{{ route('payment.process', $course) }}" method="POST">
                        @csrf
                        <script src="https://checkout.razorpay.com/v1/checkout.js"
                                data-key="{{ config('services.razorpay.key') }}"
                                data-amount="{{ $course->price * 100 }}"
                                data-currency="INR"
                                data-buttontext="Pay Now"
                                data-name="LMS Platform"
                                data-description="Enrollment: {{ $course->title }}"
                                data-image="https://ui-avatars.com/api/?name=LMS&background=0D8ABC&color=fff"
                                data-prefill.name="{{ auth()->user()->name }}"
                                data-prefill.email="{{ auth()->user()->email }}"
                                data-theme.color="#0d6efd">
                        </script>
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                    </form>
                </div>
            </div>

            <div class="text-center mt-3">
                <a href="{{ route('courses.show', $course) }}" class="text-muted text-decoration-none">Cancel and go back</a>
            </div>
        </div>
    </div>
</div>
@endsection
