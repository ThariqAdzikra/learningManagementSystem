<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS Dosen</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    
    <style>
        :root {
            --primary-dark: #2F4156;
            --primary-medium: #567C8D;
            --primary-light: #C8D9E6;
            --accent-cream: #F5EFEB;
            --white: #FFFFFF;
            --text-dark: #2F4156;
            --text-medium: #567C8D;
            --shadow-light: rgba(47, 65, 86, 0.1);
            --shadow-medium: rgba(47, 65, 86, 0.15);
            --shadow-heavy: rgba(47, 65, 86, 0.25);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        body {
            background: linear-gradient(135deg, var(--accent-cream) 0%, var(--primary-light) 100%);
            min-height: 100vh;
            color: var(--text-dark);
        }

        /* Header Styles */
        .header {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-medium));
            color: var(--white);
            padding: 20px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 20px var(--shadow-medium);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header-brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .header-brand svg {
            width: 32px;
            height: 32px;
        }

        .header-brand h1 {
            font-size: 24px;
            font-weight: 700;
            letter-spacing: -0.02em;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .header-btn {
            width: 44px;
            height: 44px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            color: var(--white);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .header-btn:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-1px);
        }

        .header-btn svg {
            width: 20px;
            height: 20px;
        }

        /* Container */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 30px;
        }

        /* Welcome Card */
        .welcome-card {
            background: linear-gradient(135deg, var(--primary-medium), var(--primary-dark));
            border-radius: 24px;
            padding: 40px;
            margin-bottom: 40px;
            color: var(--white);
            position: relative;
            overflow: hidden;
            box-shadow: 0 8px 32px var(--shadow-medium);
        }

        .welcome-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            border-radius: 50%;
        }

        .welcome-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            z-index: 2;
        }

        .welcome-text .welcome-date {
            font-size: 14px;
            opacity: 0.8;
            margin-bottom: 12px;
            font-weight: 500;
        }

        .welcome-text h2 {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 10px;
            letter-spacing: -0.02em;
        }

        .welcome-text p {
            font-size: 16px;
            opacity: 0.9;
            line-height: 1.5;
        }

        .welcome-icon {
            background: rgba(255, 255, 255, 0.15);
            padding: 20px;
            border-radius: 20px;
            backdrop-filter: blur(10px);
        }

        .welcome-icon svg {
            width: 64px;
            height: 64px;
            color: #FFD700;
            filter: drop-shadow(0 0 10px rgba(255, 215, 0, 0.3));
        }

        /* Section Titles */
        .section-title {
            font-size: 24px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 24px;
            letter-spacing: -0.02em;
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 24px;
            margin-bottom: 50px;
        }

        .stat-card {
            background: var(--white);
            border-radius: 20px;
            padding: 32px 28px;
            text-align: center;
            box-shadow: 0 6px 24px var(--shadow-light);
            border: 1px solid rgba(200, 217, 230, 0.3);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-medium), var(--primary-dark));
            transform: scaleX(0);
            transition: transform 0.4s ease;
        }

        .stat-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 40px var(--shadow-medium);
        }

        .stat-card:hover::before {
            transform: scaleX(1);
        }

        .stat-icon {
            width: 56px;
            height: 56px;
            background: linear-gradient(135deg, var(--primary-light), var(--primary-medium));
            border-radius: 16px;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .stat-icon svg {
            width: 28px;
            height: 28px;
            color: var(--primary-dark);
        }

        .stat-card h3 {
            font-size: 42px;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 8px;
            line-height: 1;
        }

        .stat-card p {
            color: var(--text-medium);
            font-size: 16px;
            font-weight: 600;
        }

        /* Courses Grid */
        .courses-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 24px;
        }

        .course-card {
            background: var(--white);
            border-radius: 20px;
            padding: 28px;
            box-shadow: 0 6px 24px var(--shadow-light);
            border: 1px solid rgba(200, 217, 230, 0.3);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .course-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-medium), var(--primary-dark));
        }

        .course-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 40px var(--shadow-medium);
        }

        .course-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 24px;
        }

        .course-title {
            font-size: 18px;
            font-weight: 700;
            color: var(--text-dark);
            line-height: 1.3;
            flex: 1;
            margin-right: 16px;
        }

        .course-menu {
            width: 36px;
            height: 36px;
            background: rgba(86, 124, 141, 0.1);
            border-radius: 10px;
            color: var(--text-medium);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            flex-shrink: 0;
        }

        .course-menu:hover {
            background: rgba(86, 124, 141, 0.2);
            color: var(--primary-dark);
        }

        .course-menu svg {
            width: 18px;
            height: 18px;
        }

        .course-progress {
            margin-bottom: 24px;
        }

        .progress-header {
            display: flex;
            justify-content: between;
            align-items: center;
            margin-bottom: 12px;
        }

        .progress-percentage {
            font-size: 14px;
            font-weight: 600;
            color: var(--text-medium);
        }

        .progress-bar {
            width: 100%;
            height: 8px;
            background: var(--primary-light);
            border-radius: 6px;
            overflow: hidden;
            margin-bottom: 16px;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--primary-medium), var(--primary-dark));
            border-radius: 6px;
            transition: width 1s ease-out;
        }

        .progress-circles {
            display: flex;
            gap: 8px;
            margin-bottom: 4px;
        }

        .progress-circle {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: var(--primary-light);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .progress-circle.completed {
            background: linear-gradient(135deg, var(--primary-medium), var(--primary-dark));
            color: var(--white);
        }

        .progress-circle.completed svg {
            width: 14px;
            height: 14px;
        }

        .course-info {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .course-detail {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 14px;
            color: var(--text-medium);
            font-weight: 500;
        }

        .course-detail-icon {
            width: 18px;
            height: 18px;
            color: var(--primary-medium);
            flex-shrink: 0;
        }

        /* Footer */
        .footer {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-medium));
            color: var(--white);
            text-align: center;
            padding: 32px 30px;
            margin-top: 60px;
        }

        .footer p {
            font-size: 14px;
            opacity: 0.9;
            font-weight: 500;
        }

        /* Chat Button */
        .chat-button {
            position: fixed;
            bottom: 32px;
            right: 32px;
            width: 64px;
            height: 64px;
            background: linear-gradient(135deg, var(--primary-medium), var(--primary-dark));
            border: none;
            border-radius: 50%;
            color: var(--white);
            cursor: pointer;
            box-shadow: 0 8px 32px var(--shadow-medium);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }

        .chat-button:hover {
            transform: scale(1.1) translateY(-2px);
            box-shadow: 0 12px 40px var(--shadow-heavy);
        }

        .chat-button svg {
            width: 28px;
            height: 28px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding: 24px 20px;
            }

            .header {
                padding: 16px 20px;
            }

            .welcome-card {
                padding: 28px;
            }

            .welcome-content {
                flex-direction: column;
                text-align: center;
                gap: 24px;
            }

            .welcome-text h2 {
                font-size: 26px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .courses-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .chat-button {
                bottom: 24px;
                right: 24px;
                width: 56px;
                height: 56px;
            }

            .chat-button svg {
                width: 24px;
                height: 24px;
            }
        }

        @media (max-width: 480px) {
            .header-brand h1 {
                font-size: 20px;
            }

            .section-title {
                font-size: 20px;
            }

            .welcome-text h2 {
                font-size: 22px;
            }
        }
    </style>

    @stack('styles')
</head>
<body style="background-color: #f8f9fa;">
    <nav class="navbar navbar-expand-lg shadow-sm" style="background: linear-gradient(135deg, #2F4156, #567C8D);">
    <div class="container-fluid">
        <!-- Brand -->
        <a class="navbar-brand d-flex align-items-center text-white fw-bold" href="#">
            <svg viewBox="0 0 24 24" fill="currentColor" width="28" height="28" class="me-2">
                <path d="M12 2L2 7L12 12L22 7L12 2Z" />
                <path d="M2 17L12 22L22 17" />
                <path d="M2 12L12 17L22 12" />
            </svg>
            SmartPal
        </a>

        <!-- Toggle button (mobile) -->
        <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <!-- Tambahkan link menu -->
                <li class="nav-item">
                    <a class="nav-link text-white fw-semibold" href="#">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white fw-semibold" href="#">Kelas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white fw-semibold" href="#">Mahasiswa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white fw-semibold" href="#">Pengaturan</a>
                </li>
            </ul>

            <!-- Action Buttons -->
            <div class="d-flex gap-2 ms-lg-3">
                <button class="header-btn">
                    <i class="fas fa-plus"></i>
                </button>
                <button class="header-btn">
                    <i class="fas fa-bell"></i>
                </button>
                <button class="header-btn">
                    <i class="fas fa-user-circle"></i>
                </button>
            </div>
        </div>
    </div>
</nav>


    <main class="py-4">
        @yield('content')
    </main>

    <footer class="text-white-50 text-center py-3 mt-auto" style="background-color: #1e293b;">
        <div class="container">
            <small>&copy;    2025 Dikembangkan dengan senyuman, oleh SmartPal group.</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    @stack('scripts')
</body>
</html>