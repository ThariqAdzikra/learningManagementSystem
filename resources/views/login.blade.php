<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartPal - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
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
            max-width: 450px;
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

        .form-control::placeholder {
            color: #C8D9E6;
            opacity: 0.7;
        }

        .form-control:focus {
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
            border-color: #C8D9E6;
            box-shadow: none;
        }
        
        .form-check-label, .link-forgot {
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
    <div class="login-card">
        <div class="login-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M5.52 19c.64-2.2 1.84-3.5 3.55-4.5.34-.17.65-.33.97-.5a.8.8 0 0 1 .46-.08c.36 0 .8.2 1.34.52s1.42 1.22 2.76 1.84a12.63 12.63 0 0 0 4.2-.4" />
                <circle cx="12" cy="7" r="4" />
            </svg>
        </div>
        <h2>Login</h2>
        <form action="#" method="POST">
            @csrf
            <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text bg-transparent border-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user" style="color:#C8D9E6;">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </span>
                    <input type="text" class="form-control" placeholder="Username" name="username" required>
                </div>
            </div>
            <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text bg-transparent border-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock" style="color:#C8D9E6;">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                        </svg>
                    </span>
                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                    <span class="input-group-text bg-transparent border-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye-off" style="color:#C8D9E6;">
                            <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.91 4.24A10.07 10.07 0 0 1 12 4c7 0 11 8 11 8a18.45 18.45 0 0 1-2.09 3.58"></path>
                            <line x1="1" y1="1" x2="23" y2="23"></line>
                        </svg>
                    </span>
                </div>
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
            <p class="text-center">Belum punya akun? <a href="{{ route('register') }}" class="link-register">Daftar!</a></p>
        </div>
    </div>
</div>

<div class="footer">
    © 2025 Dikembangkan dengan senyuman, oleh SmartPal group.
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>