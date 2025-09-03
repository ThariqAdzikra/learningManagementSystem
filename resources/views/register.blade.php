<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartPal - Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #2F4156;
            color: #C8D9E6;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .header {
            background-color: #2F4156;
            color: #C8D9E6;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header .navbar-brand {
            color: #C8D9E6;
            font-weight: bold;
        }

        .header-actions a {
            color: #C8D9E6;
            text-decoration: none;
            margin-left: 1rem;
        }

        .register-card {
            background: linear-gradient(135deg, #567C8D 0%, #2F4156 100%);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            text-align: center;
            margin: auto;
            max-width: 500px;
        }

        .register-card h2 {
            font-weight: bold;
            color: white;
            margin-bottom: 2rem;
        }

        .form-control,
        .form-select {
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            padding: 15px;
            border-radius: 10px;
        }

        .form-control:not(:last-child) {
            border-right: 0;
        }

        .form-control::placeholder {
            color: #C8D9E6;
            opacity: 0.7;
        }

        .form-control:focus,
        .form-select:focus {
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
            border-color: rgba(255, 255, 255, 0.2);
            box-shadow: none;
            z-index: 2;
        }

        .input-group-text {
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-left: 0;
            cursor: pointer;
        }

        .form-select {
            color: #C8D9E6;
        }

        .form-select option {
            background-color: #2F4156;
            color: #C8D9E6;
        }

        .btn-register {
            background: linear-gradient(90deg, #C8D9E6, #567C8D);
            border: none;
            color: #2F4156;
            font-weight: bold;
            padding: 15px;
            border-radius: 10px;
        }

        .footer {
            background-color: #2F4156;
            color: white;
            text-align: center;
            padding: 15px;
            margin-top: auto;
        }

        .link-register {
            color: #C8D9E6;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="header">
        <a class="navbar-brand" href="{{ route('landing') }}">SmartPal</a>
        <div class="header-actions">
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        </div>
    </div>
    <div class="container d-flex justify-content-center align-items-center" style="flex: 1;">
        <div class="register-card">
            <h2>Register</h2>
            @if ($errors->any())
                <div class="alert alert-danger text-start">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('register.submit') }}" method="POST">
                @csrf
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="First Name" name="first_name" required
                            value="{{ old('first_name') }}">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="Last Name" name="last_name" required
                            value="{{ old('last_name') }}">
                    </div>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Username" name="username" required
                        value="{{ old('username') }}">
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" placeholder="Email" name="email" required
                        value="{{ old('email') }}">
                </div>
                <div class="mb-3">
                    <select class="form-select" name="role" required>
                        <option value="" selected disabled>Select your role</option>
                        <option value="dosen" {{ old('role') == 'dosen' ? 'selected' : '' }}>Lecturer</option>
                        <option value="mahasiswa" {{ old('role') == 'mahasiswa' ? 'selected' : '' }}>Student</option>
                    </select>
                </div>

                <div class="mb-3 input-group">
                    <input type="password" class="form-control" placeholder="Password" name="password" id="password"
                        required>
                    <span class="input-group-text toggle-password" data-target="password">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#C8D9E6"
                            class="bi bi-eye-slash-fill" viewBox="0 0 16 16">
                            <path
                                d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z" />
                            <path
                                d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12-.708.708z" />
                        </svg>
                    </span>
                </div>

                <div class="mb-4 input-group">
                    <input type="password" class="form-control" placeholder="Confirm Password"
                        name="password_confirmation" id="password_confirmation" required>
                    <span class="input-group-text toggle-password" data-target="password_confirmation">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#C8D9E6"
                            class="bi bi-eye-slash-fill" viewBox="0 0 16 16">
                            <path
                                d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z" />
                            <path
                                d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12-.708.708z" />
                        </svg>
                    </span>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-register">Register</button>
                </div>
            </form>
            <div class="mt-4">
                <p class="text-center">Already have an account? <a href="{{ route('login') }}"
                        class="link-register">Login!</a></p>
            </div>
        </div>
    </div>
    <div class="footer">
        © 2025 Developed with a smile by SmartPal group.
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const togglePasswordSpans = document.querySelectorAll('.toggle-password');

            // SVG Ikon
            const eyeOpenSVG = `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#C8D9E6" class="bi bi-eye-fill" viewBox="0 0 16 16"><path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/><path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/></svg>`;
            const eyeClosedSVG = `<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#C8D9E6" class="bi bi-eye-slash-fill" viewBox="0 0 16 16"><path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/><path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12-.708.708z"/></svg>`;

            togglePasswordSpans.forEach(span => {
                span.addEventListener('click', function () {
                    const targetId = this.getAttribute('data-target');
                    const passwordInput = document.getElementById(targetId);

                    if (passwordInput) {
                        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                        passwordInput.setAttribute('type', type);
                        this.innerHTML = type === 'password' ? eyeClosedSVG : eyeOpenSVG;
                    }
                });
            });
        });
    </script>
</body>

</html>