<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learning Management System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Custom CSS (optional) -->
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        main {
            flex: 1;
        }
        .modal-body .form-control {
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>

    @include('partials.header')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="login-error-alert" class="alert alert-danger d-none"></div>
                    <form id="loginForm" action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="login-email">Email address</label>
                            <input type="email" class="form-control" id="login-email" name="email" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="login-password">Password</label>
                            <input type="password" class="form-control" id="login-password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 mt-3">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Register Modal -->
    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerModalLabel">Create an Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="register-error-alert" class="alert alert-danger d-none"></div>
                    <form id="registerForm" action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="register-name">Name</label>
                            <input type="text" class="form-control" id="register-name" name="name" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="register-email">Email address</label>
                            <input type="email" class="form-control" id="register-email" name="email" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="register-password">Password</label>
                            <input type="password" class="form-control" id="register-password" name="password" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="register-password-confirmation">Confirm Password</label>
                            <input type="password" class="form-control" id="register-password-confirmation" name="password_confirmation" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 mt-3">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Axios for AJAX requests -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        function handleFormSubmission(formId, errorAlertId) {
            document.getElementById(formId).addEventListener('submit', function (e) {
                e.preventDefault();
                const form = e.target;
                const formData = new FormData(form);
                const errorAlert = document.getElementById(errorAlertId);
                errorAlert.classList.add('d-none');

                axios.post(form.action, formData)
                    .then(response => {
                        // On success, redirect based on role
                        if (response.data.role === 'admin') {
                            window.location.href = '/admin/dashboard';
                        } else {
                            window.location.href = '/dashboard';
                        }
                    })
                    .catch(error => {
                        if (error.response && error.response.status === 422) {
                            const errors = error.response.data.errors;
                            let errorMessages = '';
                            for (const key in errors) {
                                errorMessages += errors[key][0] + '<br>';
                            }
                            errorAlert.innerHTML = errorMessages;
                            errorAlert.classList.remove('d-none');
                        } else {
                            errorAlert.innerHTML = 'An unexpected error occurred. Please try again.';
                            errorAlert.classList.remove('d-none');
                        }
                    });
            });
        }

        handleFormSubmission('loginForm', 'login-error-alert');
        handleFormSubmission('registerForm', 'register-error-alert');
    </script>
</body>
</html>
