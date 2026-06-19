<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PublicCourseController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingPageController::class, 'index']);
Route::get('/about', [LandingPageController::class, 'about'])->name('about');
Route::get('/contact', [LandingPageController::class, 'contact'])->name('contact');
Route::post('/contact', [LandingPageController::class, 'submitContact'])->name('contact.submit');

Route::get('/courses', [PublicCourseController::class, 'index'])->name('courses.index');
Route::get('/courses/{course}', [PublicCourseController::class, 'show'])->name('courses.show');

// Authentication routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// User Dashboard & Enrollment
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/courses', [DashboardController::class, 'courses'])->name('dashboard.courses');
    Route::get('/dashboard/completed', [DashboardController::class, 'completed'])->name('dashboard.completed');
    Route::get('/dashboard/certificates', [DashboardController::class, 'certificates'])->name('dashboard.certificates');
    Route::get('/dashboard/feedback', [DashboardController::class, 'feedback'])->name('dashboard.feedback');

    // Profile Routes
    Route::get('/dashboard/profile', function () { return view('dashboard.profile'); })->name('dashboard.profile');
    Route::put('/dashboard/profile', [DashboardController::class, 'updateProfile'])->name('dashboard.profile.update');

    // Updated Enrollment flow with Payment
    Route::get('/courses/{course}/checkout', [PaymentController::class, 'checkout'])->name('courses.enroll');
    Route::post('/courses/{course}/process', [PaymentController::class, 'process'])->name('payment.process');
});

// Admin Dashboard & Management
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Resource Controllers
    Route::resource('users', UserController::class)->except(['create', 'store', 'show']);
    Route::resource('courses', CourseController::class);
    Route::resource('courses.lessons', LessonController::class)->except(['index', 'show']);
    Route::resource('categories', CategoryController::class)->except(['create', 'edit', 'show']);
    Route::resource('certificates', CertificateController::class)->only(['index', 'store', 'show', 'destroy']);

    // Admin Placeholder Routes
    Route::get('/instructors', [AdminController::class, 'instructors'])->name('instructors.index');
    Route::get('/lessons', [AdminController::class, 'lessons'])->name('lessons.index');
    Route::get('/enrollments', [AdminController::class, 'enrollments'])->name('enrollments.index');
    Route::get('/reviews', [AdminController::class, 'reviews'])->name('reviews.index');
    Route::get('/reports', [AdminController::class, 'reports'])->name('reports.index');
    Route::get('/settings', [AdminController::class, 'settings'])->name('settings.index');
});
