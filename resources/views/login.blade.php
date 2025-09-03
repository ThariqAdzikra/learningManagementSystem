<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartPal - Login</title>
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

        .login-card {
            background: linear-gradient(135deg, #567C8D 0%, #2F4156 100%);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            text-align: center;
            margin: auto;
            max-width: 550px;
            width: 100%;
        }

        .login-icon {
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid rgba(255, 255, 255, 0.2);
        }

        .login-icon svg {
            color: #C8D9E6;
            width: 40px;
            height: 40px;
        }

        .login-card h2 {
            font-weight: bold;
            color: white;
            margin-bottom: 2rem;
        }

        .form-control {
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            padding: 15px;
            border-radius: 10px;
        }

        /* Menghilangkan border pada sisi kanan input saat digabung dengan ikon */
        .form-control:not(:last-child) {
            border-right: 0;
        }

        .form-control::placeholder {
            color: #C8D9E6;
            opacity: 0.7;
        }

        .form-control:focus {
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
            border-color: rgba(255, 255, 255, 0.2);
            box-shadow: none;
            z-index: 2;
            /* Agar shadow focus tidak terpotong */
        }

        .input-group-text {
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-left: 0;
            cursor: pointer;
            /* Menambahkan cursor pointer pada ikon */
        }

        .form-check-label,
        .link-forgot {
            color: #C8D9E6;
        }

        .btn-login {
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
        <div class="login-card">
            <div class="login-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M5.52 19c.64-2.2 1.84-3.5 3.55-4.5.34-.17.65-.33.97-.5a.8.8 0 0 1 .46-.08c.36 0 .8.2 1.34.52s1.42 1.22 2.76 1.84a12.63 12.63 0 0 0 4.2-.4" />
                    <circle cx="12" cy="7" r="4" />
                </svg>
            </div>
            <h2>Login</h2>

            <form action="{{ route('login') }}" method="POST">
                @csrf
                @if($errors->any())
                    <div class="alert alert-danger text-start" role="alert"
                        style="background-color: rgba(217, 83, 79, 0.3); border: none; color: white;">
                        @foreach ($errors->all() as $error)
                            <span>{{ $error }}</span>
                        @endforeach
                    </div>
                @endif

                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Username" name="username"
                        value="{{ old('username') }}" required>
                </div>

                <div class="mb-3 input-group">
                    <input type="password" class="form-control" placeholder="Password" name="password" id="password"
                        required>
                    <span class="input-group-text" id="togglePassword">
                        <svg id="eye-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#C8D9E6"
                            class="bi bi-eye-slash-fill" viewBox="0 0 16 16">
                            <path
                                d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z" />
                            <path
                                d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12-.708.708z" />
                        </svg>
                    </span>
                </div>
                <div class="d-flex justify-content-between mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="rememberMe" name="remember">
                        <label class="form-check-label" for="rememberMe">Ingat saya!</label>
                    </div>
                    <a href="#" class="link-forgot">Lupa Password?</a>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-login">Login</button>
                </div>
            </form>
            <div class="mt-4">
                <p class="text-center">Belum punya akun? <a href="{{ route('register') }}"
                        class="link-register">Daftar!</a></p>
            </div>
        </div>
    </div>

    <div class="footer">
        © 2025 Dikembangkan dengan senyuman, oleh SmartPal group.
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const togglePassword = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');

            // SVG untuk ikon mata terbuka
            const eyeOpenSVG = `
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#C8D9E6" class="bi bi-eye-fill" viewBox="0 0 16 16">
                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                </svg>`;

            // SVG untuk ikon mata tertutup (slash)
            const eyeClosedSVG = `
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#C8D9E6" class="bi bi-eye-slash-fill" viewBox="0 0 16 16">
                    <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
                    <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12-.708.708z"/>
                </svg>`;

            togglePassword.addEventListener('click', function () {
                // Mengganti tipe input password
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);

                // Mengganti ikon
                if (type === 'text') {
                    this.innerHTML = eyeOpenSVG;
                } else {
                    this.innerHTML = eyeClosedSVG;
                }
            });
        });
    </script>
</body>

</html>