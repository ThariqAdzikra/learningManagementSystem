<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartPal - Dashboard Dosen</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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

        .header-btn,
        .header-btn a {
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
            padding: 0;
            text-decoration: none;
        }

        .header-btn:hover,
        .header-btn a:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-1px);
        }

        .header-btn svg,
        .header-btn a svg {
            width: 20px;
            height: 20px;
        }

        form.logout-form {
            display: inline-flex;
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
            background: none;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .welcome-icon i {
            font-size: 5rem;
            color: #fbbf24;
            opacity: 0.8;
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
            background: linear-gradient(135deg, var(--accent-cream), var(--white));
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

        .stat-icon i {
            font-size: 28px;
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
            grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
            gap: 24px;
        }

        /* Course Card */
        .course-card {
            background: linear-gradient(135deg, #496378, #2F4156);
            color: var(--white);
            border-radius: 20px;
            padding: 28px;
            box-shadow: 0 8px 32px var(--shadow-medium);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            height: 100%;
            border: none;
        }

        .course-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-light), var(--accent-cream));
        }

        .course-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 16px 40px var(--shadow-heavy);
        }

        .course-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 16px;
        }

        .course-title {
            font-size: 20px;
            font-weight: 700;
            color: var(--white);
            line-height: 1.3;
            flex: 1;
            margin-right: 16px;
        }

        .course-actions {
            position: relative;
        }

        .course-actions .dropdown-menu {
            border: none;
            box-shadow: 0 10px 25px var(--shadow-medium);
            border-radius: 12px;
            position: absolute;
            right: 0;
            top: 100%;
            margin-top: 10px;
            background-color: var(--white);
            z-index: 10;
            min-width: 150px;
            display: none;
            flex-direction: column;
            padding: 8px 0;
        }

        .course-actions .dropdown-menu.show {
            display: flex;
        }

        .course-actions .dropdown-menu .dropdown-item {
            padding: 10px 20px;
            text-decoration: none;
            color: var(--text-dark);
            font-size: 14px;
            display: block;
            transition: background-color 0.2s;
        }

        .course-actions .dropdown-menu .dropdown-item:hover {
            background-color: var(--primary-light);
        }

        .course-actions .dropdown-menu .dropdown-divider {
            height: 1px;
            margin: 8px 0;
            background-color: var(--primary-light);
        }

        .course-actions .dropdown-menu .dropdown-item.text-danger {
            color: #dc3545;
        }

        .course-actions .dropdown-menu .dropdown-item i {
            margin-right: 8px;
        }

        .course-info {
            display: flex;
            flex-direction: column;
            gap: 14px;
            margin-top: auto;
        }

        .course-detail {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 15px;
            color: var(--primary-light);
            font-weight: 500;
            opacity: 0.9;
        }

        .course-detail-icon {
            width: 20px;
            height: 20px;
            color: var(--primary-light);
            flex-shrink: 0;
        }

        .course-detail-icon i {
            font-size: 20px;
        }

        .empty-state {
            background: var(--white);
            border-radius: 20px;
            padding: 50px 30px;
            text-align: center;
            box-shadow: 0 6px 24px var(--shadow-light);
            border: 1px solid rgba(200, 217, 230, 0.3);
            grid-column: 1 / -1;
        }

        .empty-state h5 {
            font-size: 20px;
            font-weight: 600;
            color: var(--text-medium);
        }

        .empty-state p {
            font-size: 16px;
            color: var(--text-medium);
            margin-bottom: 24px;
        }

        .empty-state button {
            background: linear-gradient(135deg, var(--primary-medium), var(--primary-dark));
            color: var(--white);
            border: none;
            border-radius: 10px;
            padding: 12px 24px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .empty-state button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
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

        /* CSS UNTUK MODAL TAMBAH KELAS */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(47, 65, 86, 0.85);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 2000;
            opacity: 0;
            transition: opacity 0.3s ease;
            backdrop-filter: blur(5px);
        }

        .modal-overlay.active {
            display: flex;
            opacity: 1;
        }

        .modal-content {
            background: linear-gradient(145deg, var(--white), var(--accent-cream));
            padding: 32px;
            border-radius: 24px;
            box-shadow: 0 10px 40px var(--shadow-heavy);
            width: 90%;
            max-width: 500px;
            transform: scale(0.95);
            transition: transform 0.3s ease;
            border: 1px solid var(--primary-light);
        }

        .modal-overlay.active .modal-content {
            transform: scale(1);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
            border-bottom: 1px solid var(--primary-light);
            padding-bottom: 16px;
        }

        .modal-header h3 {
            font-size: 22px;
            color: var(--text-dark);
            margin: 0;
        }

        .close-btn {
            background: none;
            border: none;
            font-size: 32px;
            font-weight: 300;
            color: var(--text-medium);
            cursor: pointer;
            line-height: 1;
            padding: 0 5px;
        }

        .modal-body p {
            font-size: 16px;
            color: var(--text-medium);
            line-height: 1.6;
            margin-bottom: 24px;
        }

        .modal-form .form-group {
            margin-bottom: 20px;
        }

        .modal-form label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--text-dark);
        }

        .modal-form input[type="text"],
        .modal-form textarea {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid var(--primary-light);
            border-radius: 12px;
            font-size: 16px;
            transition: all 0.2s ease;
            background-color: #fff;
            font-family: inherit;
        }

        .modal-form textarea {
            resize: vertical;
            min-height: 80px;
        }

        .modal-form input[type="text"]:focus,
        .modal-form textarea:focus {
            outline: none;
            border-color: var(--primary-medium);
            box-shadow: 0 0 0 4px rgba(86, 124, 141, 0.2);
        }

        .submit-btn {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--primary-medium), var(--primary-dark));
            color: var(--white);
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(47, 65, 86, 0.3);
        }

        /* CSS UNTUK CHATBOT */
        #chatbot-container {
            position: fixed;
            bottom: 32px;
            right: 32px;
            z-index: 1000;
        }

        #chat-open-button {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            box-shadow: 0 8px 32px var(--shadow-medium);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            border: none;
            background: linear-gradient(135deg, var(--primary-medium), var(--primary-dark));
            color: var(--white);
        }

        #chat-open-button svg {
            width: 24px;
            height: 24px;
        }

        #chatbot-window {
            position: absolute;
            bottom: 88px;
            right: 0;
            width: 370px;
            max-height: 550px;
            background-color: var(--white);
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            overflow: hidden;
            opacity: 0;
            transform: translateY(20px) scale(0.95);
            transform-origin: bottom right;
            transition: opacity 0.3s ease, transform 0.3s ease;
            pointer-events: none;
        }

        #chatbot-window.active {
            opacity: 1;
            transform: translateY(0) scale(1);
            pointer-events: auto;
        }

        .chatbot-header {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-medium));
            color: var(--white);
            padding: 16px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-shrink: 0;
        }

        .chatbot-title {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 600;
            font-size: 18px;
        }

        .chatbot-body {
            flex-grow: 1;
            padding: 20px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .message {
            max-width: 80%;
            padding: 10px 16px;
            border-radius: 18px;
            line-height: 1.5;
            word-wrap: break-word;
        }

        .message.bot {
            background-color: var(--primary-light);
            color: var(--text-dark);
            align-self: flex-start;
            border-bottom-left-radius: 4px;
        }

        .message.user {
            background-color: var(--primary-medium);
            color: var(--white);
            align-self: flex-end;
            border-bottom-right-radius: 4px;
        }

        .chatbot-footer {
            padding: 16px;
            border-top: 1px solid #e0e0e0;
            flex-shrink: 0;
        }

        #chatbot-form {
            display: flex;
            gap: 10px;
        }

        #chatbot-input {
            flex-grow: 1;
            border: 1px solid var(--primary-light);
            border-radius: 20px;
            padding: 10px 16px;
            font-size: 14px;
            outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        #chatbot-form button {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            border: none;
            background: var(--primary-medium);
            color: var(--white);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.2s;
            flex-shrink: 0;
        }

        /* Animasi untuk card */
        .fade-in-up {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }

        .fade-in-up.is-visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>

<body>
    @extends('layouts.app')

    @section('content')
        <header class="header">
            <div class="header-brand">
                <svg viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2L2 7L12 12L22 7L12 2Z" />
                    <path d="M2 17L12 22L22 17" />
                    <path d="M2 12L12 17L22 12" />
                </svg>
                <h1>SmartPal</h1>
            </div>
            <div class="header-actions">
                <button id="openModalBtn" class="header-btn" title="Tambah Kelas Baru">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                </button>
                <button class="header-btn" title="Notifikasi">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                        <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                    </svg>
                </button>
                <a href="{{ route('profile.show') }}" class="header-btn" title="Profil">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </a>
                <form method="POST" action="{{ route('logout') }}" class="logout-form">
                    @csrf
                    <button type="submit" class="header-btn" title="Logout">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                            <polyline points="16 17 21 12 16 7"></polyline>
                            <line x1="21" y1="12" x2="9" y2="12"></line>
                        </svg>
                    </button>
                </form>
            </div>
        </header>

        <main class="container">
            <section class="welcome-card">
                <div class="welcome-content">
                    <div class="welcome-text">
                        <div class="welcome-date">{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</div>
                        <h2>Selamat Pagi, {{ $dosen->name }}</h2>
                        <p>Semangat mengajar dan membimbing mahasiswa hari ini!</p>
                    </div>
                    <div class="welcome-icon">
                        <i class="fas fa-sun"></i>
                    </div>
                </div>
            </section>

            <section>
                <h3 class="section-title">Overview</h3>
                <div class="stats-grid">
                    <div class="stat-card fade-in-up">
                        <div class="stat-icon">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <h3>{{ $stats['classCount'] }}</h3>
                        <p>Kelas</p>
                    </div>
                    <div class="stat-card fade-in-up">
                        <div class="stat-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3>{{ $stats['studentCount'] }}</h3>
                        <p>Mahasiswa</p>
                    </div>
                    <div class="stat-card fade-in-up">
                        <div class="stat-icon">
                            <i class="fas fa-tasks"></i>
                        </div>
                        <h3>{{ $stats['assignmentCount'] }}</h3>
                        <p>Tugas</p>
                    </div>
                </div>
            </section>

            <section>
                <h3 class="section-title">My Course</h3>
                <div class="courses-grid">
                    @forelse ($courses as $course)
                        <div class="course-card fade-in-up">
                            <div class="course-header">
                                <h4 class="course-title">{{ $course->name }}</h4>
                                <div class="course-actions">
                                    <button class="header-btn" aria-haspopup="true" aria-expanded="false"
                                        onclick="toggleDropdown(this)">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#"><i class="fas fa-edit me-2"></i>Edit Kelas</a>
                                        </li>
                                        <li><a class="dropdown-item" href="#"><i class="fas fa-eye me-2"></i>Detail Kelas</a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item text-danger" href="#"><i
                                                    class="fas fa-trash me-2"></i>Hapus</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="course-info">
                                <div class="course-detail">
                                    <span class="course-detail-icon"><i class="fas fa-book"></i></span>
                                    <span>Kode Join: {{ $course->code }}</span>
                                </div>
                                <div class="course-detail">
                                    <span class="course-detail-icon"><i class="fas fa-users"></i></span>
                                    <span>{{ $course->students_count }} Mahasiswa</span>
                                </div>
                                <div class="course-detail">
                                    <span class="course-detail-icon"><i class="fas fa-clock"></i></span>
                                    <span>{{ $course->schedule ?? 'Belum diatur' }}</span>
                                </div>
                            </div>
                            <div style="margin-top: 24px;">
                                <a href="{{ route('dosen.kelas.show', $course) }}"
                                    style="width: 100%; padding: 14px; border-radius: 12px; background: linear-gradient(135deg, var(--primary-light), var(--accent-cream)); color: var(--text-dark); text-align: center; text-decoration: none; font-weight: 600; display: block; transition: all 0.3s ease;">
                                    Buka Kelas
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="empty-state fade-in-up">
                            <div style="margin-bottom: 16px;">
                                <i class="fas fa-chalkboard-teacher" style="font-size: 4rem; color: #cbd5e1;"></i>
                            </div>
                            <h5>Anda Belum Memiliki Kelas</h5>
                            <p>Tambahkan kelas baru untuk memulai mengajar.</p>
                            <button id="addCourseBtn" type="button"><i class="fas fa-plus me-2"></i> Tambah Kelas Baru</button>
                        </div>
                    @endforelse
                </div>
            </section>
        </main>

        <footer class="footer">
            <p>&copy; 2025 Dikembangkan dengan senyuman, oleh SmartPal group.</p>
        </footer>

        <div id="addCourseModal" class="modal-overlay">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Tambah Kelas Baru ✨</h3>
                    <button id="closeModalBtn" class="close-btn">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Isi informasi di bawah ini. Kode kelas untuk mahasiswa akan dibuat secara otomatis.</p>

                    {{-- PERBAIKAN: Nama route disesuaikan dengan web.php --}}
                    <form action="{{ route('dosen.kelas.store') }}" method="POST" class="modal-form" id="addCourseForm">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama Kelas</label>
                            <input type="text" id="name" name="name" placeholder="Contoh: Pemrograman Web Lanjut" required
                                autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label for="schedule">Jadwal (Opsional)</label>
                            <input type="text" id="schedule" name="schedule" placeholder="Contoh: Senin, 10:00 - 12:00"
                                autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label for="description">Deskripsi (Opsional)</label>
                            <textarea id="description" name="description"
                                placeholder="Deskripsi singkat mengenai mata kuliah ini..."></textarea>
                        </div>

                        <button type="submit" class="submit-btn">Buat Kelas</button>
                    </form>
                </div>
            </div>
        </div>

        <div id="chatbot-container">
            <button id="chat-open-button" class="chat-button" aria-label="Open Chat">
                <svg id="chat-open-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M21 15a2 2 0 0 1-1.85 2H7l-3 3V5a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2z"></path>
                </svg>
                <svg id="chat-close-icon" style="display: none;" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
            <div id="chatbot-window">
                <div class="chatbot-header">
                    <div class="chatbot-title">
                        <svg viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2L2 7L12 12L22 7L12 2Z" />
                            <path d="M2 17L12 22L22 17" />
                            <path d="M2 12L12 17L22 12" />
                        </svg>
                        <span>SmartPal Bot</span>
                    </div>
                </div>
                <div id="chatbot-body" class="chatbot-body">
                    <div class="message bot">
                        <p>Halo {{ $dosen->name }}! Ada yang bisa saya bantu?</p>
                    </div>
                </div>
                <div class="chatbot-footer">
                    <form id="chatbot-form">
                        <input type="text" id="chatbot-input" placeholder="Ketik pesan Anda..." autocomplete="off">
                        <button type="submit" aria-label="Send Message"><svg viewBox="0 0 24 24" fill="currentColor">
                                <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"></path>
                            </svg></button>
                    </form>
                </div>
            </div>
        </div>
    @endsection

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // --- LOGIKA UTAMA & ANIMASI ---
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('is-visible');
                        }
                    });
                }, {
                    threshold: 0.1
                });
                document.querySelectorAll('.stat-card, .course-card, .empty-state').forEach(card => {
                    card.classList.add('fade-in-up');
                    observer.observe(card);
                });

                // --- LOGIKA UNTUK MODAL TAMBAH KELAS ---
                const openModalBtn = document.getElementById('openModalBtn');
                const addCourseBtn = document.getElementById('addCourseBtn');
                const closeModalBtn = document.getElementById('closeModalBtn');
                const addCourseModal = document.getElementById('addCourseModal');

                function openModal() {
                    if (addCourseModal) {
                        addCourseModal.classList.add('active');
                    }
                }

                if (openModalBtn) openModalBtn.addEventListener('click', openModal);
                if (addCourseBtn) addCourseBtn.addEventListener('click', openModal);

                if (closeModalBtn) {
                    closeModalBtn.addEventListener('click', () => {
                        addCourseModal.classList.remove('active');
                    });
                }
                if (addCourseModal) {
                    addCourseModal.addEventListener('click', (event) => {
                        if (event.target === addCourseModal) {
                            addCourseModal.classList.remove('active');
                        }
                    });
                }

                // --- LOGIKA UNTUK DROPDOWN MENU DI CARD KELAS ---
                window.toggleDropdown = function (element) {
                    const dropdownMenu = element.nextElementSibling;
                    const allDropdowns = document.querySelectorAll('.dropdown-menu');
                    allDropdowns.forEach(menu => {
                        if (menu !== dropdownMenu) {
                            menu.classList.remove('show');
                        }
                    });
                    dropdownMenu.classList.toggle('show');
                }
                document.addEventListener('click', function (event) {
                    if (!event.target.closest('.course-actions')) {
                        document.querySelectorAll('.dropdown-menu').forEach(menu => {
                            menu.classList.remove('show');
                        });
                    }
                });

                // --- LOGIKA UNTUK CHATBOT ---
                const chatOpenButton = document.getElementById('chat-open-button');
                const chatbotWindow = document.getElementById('chatbot-window');
                const chatOpenIcon = document.getElementById('chat-open-icon');
                const chatCloseIcon = document.getElementById('chat-close-icon');
                const chatBody = document.getElementById('chatbot-body');
                const chatForm = document.getElementById('chatbot-form');
                const chatInput = document.getElementById('chatbot-input');

                if (chatOpenButton) {
                    chatOpenButton.addEventListener('click', () => {
                        chatbotWindow.classList.toggle('active');
                        chatOpenIcon.style.display = chatbotWindow.classList.contains('active') ? 'none' : 'block';
                        chatCloseIcon.style.display = chatbotWindow.classList.contains('active') ? 'block' : 'none';
                    });
                }

                const scrollToBottom = () => { if (chatBody) chatBody.scrollTop = chatBody.scrollHeight; }

                const addUserMessage = (message) => {
                    const messageElement = document.createElement('div');
                    messageElement.className = 'message user';
                    messageElement.innerHTML = `<p>${message}</p>`;
                    if (chatBody) chatBody.appendChild(messageElement);
                    scrollToBottom();
                }

                const addBotMessage = (message) => {
                    const typingElement = document.createElement('div');
                    typingElement.className = 'message typing';
                    typingElement.innerHTML = `<span></span><span></span><span></span>`;
                    if (chatBody) chatBody.appendChild(typingElement);
                    scrollToBottom();

                    setTimeout(() => {
                        const existingTyping = chatBody.querySelector('.message.typing');
                        if (existingTyping) {
                            existingTyping.remove();
                        }
                        const messageElement = document.createElement('div');
                        messageElement.className = 'message bot';
                        messageElement.innerHTML = `<p>${message}</p>`;
                        chatBody.appendChild(messageElement);
                        scrollToBottom();
                    }, 1200);
                }

                if (chatForm) {
                    chatForm.addEventListener('submit', (e) => {
                        e.preventDefault();
                        const userInput = chatInput.value.trim();
                        if (userInput) {
                            addUserMessage(userInput);
                            chatInput.value = '';
                            getBotResponse(userInput);
                        }
                    });
                }

                const getBotResponse = (userInput) => {
                    const lowerInput = userInput.toLowerCase();
                    let botReply = "Maaf, saya belum mengerti pertanyaan itu. Coba tanya tentang 'kelas' atau 'mahasiswa'.";
                    if (lowerInput.includes('kelas')) {
                        botReply = "Tentu, Anda bisa melihat semua daftar kelas yang Anda ajar di bagian 'My Course'. Anda juga bisa menambah kelas baru di sana.";
                    } else if (lowerInput.includes('mahasiswa')) {
                        botReply = "Anda bisa melihat jumlah total mahasiswa yang Anda ajar di bagian 'Overview' atau per kelas di halaman detail kelas.";
                    } else if (lowerInput.includes('tugas')) {
                        botReply = "Untuk mengelola tugas, silakan masuk ke halaman detail kelas, lalu navigasi ke bagian 'Tugas'.";
                    } else if (lowerInput.includes('terima kasih') || lowerInput.includes('makasih')) {
                        botReply = "Sama-sama! Senang bisa membantu.";
                    }
                    addBotMessage(botReply);
                }
            });
        </script>
    @endpush
</body>

</html>