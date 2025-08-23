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
        
        .form-control, .form-select {
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            padding: 15px;
            border-radius: 10px;
        }

        .form-control::placeholder {
            color: #C8D9E6;
            opacity: 0.7;
        }

        .form-control:focus, .form-select:focus {
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
            border-color: #C8D9E6;
            box-shadow: none;
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

        .alert-danger {
            color: #fff;
            background-color: transparent;
            border-color: transparent;
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
    <a class="navbar-brand" href="#">SmartPal</a>
    <div class="header-actions">
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register</a>
    </div>
</div>

<div class="container d-flex justify-content-center align-items-center" style="flex: 1;">
    <div class="register-card">
        <h2>Register</h2>
        
        @if ($errors->any())
            <div class="alert alert-danger">
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
                    <input type="text" class="form-control" placeholder="First Name" name="first_name" required value="{{ old('first_name') }}">
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Last Name" name="last_name" required value="{{ old('last_name') }}">
                </div>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Username" name="username" required value="{{ old('username') }}">
            </div>
            <div class="mb-3">
                <input type="email" class="form-control" placeholder="Email" name="email" required value="{{ old('email') }}">
            </div>
            <div class="mb-3">
                <select class="form-select" name="role" required>
                    <option selected disabled>Select your role</option>
                    <option value="dosen">Lecturer</option>
                    <option value="mahasiswa">Student</option>
                </select>
            </div>

<div class="mb-3">
    <div class="input-group">
        <input type="password" class="form-control" placeholder="Password" name="password" id="password-input" required>
        <span class="input-group-text bg-transparent border-0 toggle-password" data-target="password-input">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye-off" style="color:#C8D9E6;">
                <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.91 4.24A10.07 10.07 0 0 1 12 4c7 0 11 8 11 8a18.45 18.45 0 0 1-2.09 3.58"></path>
                <line x1="1" y1="1" x2="23" y2="23"></line>
            </svg>
        </span>
    </div>
</div>

<div class="mb-4">
    <div class="input-group">
        <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" id="confirm-password-input" required>
        <span class="input-group-text bg-transparent border-0 toggle-password" data-target="confirm-password-input">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye-off" style="color:#C8D9E6;">
                <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.91 4.24A10.07 10.07 0 0 1 12 4c7 0 11 8 11 8a18.45 18.45 0 0 1-2.09 3.58"></path>
                <line x1="1" y1="1" x2="23" y2="23"></line>
            </svg>
        </span>
    </div>
</div>

        
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-register">Register</button>
            </div>
        </form>
        <div class="mt-4">
            <p class="text-center">Already have an account? <a href="{{ route('login') }}" class="link-register">Login!</a></p>
        </div>
    </div>
</div>

<div class="footer">
    © 2025 Developed with a smile by SmartPal group.
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const togglePasswordSpans = document.querySelectorAll('.toggle-password');

        togglePasswordSpans.forEach(span => {
            span.addEventListener('click', function () {
                const targetId = this.getAttribute('data-target');
                const passwordInput = document.getElementById(targetId);

                const type = passwordInput.type === 'password' ? 'text' : 'password';
                passwordInput.type = type;

                const svg = this.querySelector('svg');
                if (type === 'text') {
                    svg.innerHTML = '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle>';
                } else {
                    svg.innerHTML = '<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.91 4.24A10.07 10.07 0 0 1 12 4c7 0 11 8 11 8a18.45 18.45 0 0 1-2.09 3.58"></path><line x1="1" y1="1" x2="23" y2="23"></line>';
                }
            });
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>