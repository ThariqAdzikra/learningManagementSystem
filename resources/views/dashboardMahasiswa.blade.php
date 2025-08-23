<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartPal - Dashboard Mahasiswa</title>
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
            background: none;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .welcome-icon img {
            width: 120px;
            height: auto;
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
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 1.5rem;
            }

            .stat-card {
                border-radius: 12px;
                padding: 1.5rem;
            }

            .courses-grid {
                grid-template-columns: 1fr;
                gap: 16px;
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

        /* =================================================================
           CSS UNTUK MODAL JOIN COURSE
           ================================================================== */
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(47, 65, 86, 0.6);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 2000;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .modal-overlay.active {
            display: flex;
            opacity: 1;
        }

        .modal-content {
            background: var(--white);
            padding: 32px;
            border-radius: 24px;
            box-shadow: 0 10px 40px var(--shadow-heavy);
            width: 90%;
            max-width: 500px;
            transform: scale(0.95);
            transition: transform 0.3s ease;
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

        .modal-form input[type="text"] {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid var(--primary-light);
            border-radius: 12px;
            font-size: 16px;
            transition: all 0.2s ease;
        }

        .modal-form input[type="text"]:focus {
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
            box-shadow: 0 8px 20px var(--shadow-medium);
        }

        /* =================================================================
           CSS UNTUK CHATBOT
           ================================================================== */
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

        #chat-open-button:hover {
            transform: scale(1.1);
        }

        #chat-open-button svg {
            width: 28px;
            height: 28px;
        }

        #chatbot-window {
            position: absolute;
            bottom: 88px;
            right: 0;
            width: 370px;
            height: 70vh;
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

        #chatbot-window.expanded {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 90vw;
            max-width: 800px;
            height: 85vh;
            max-height: 900px;
            bottom: auto;
            right: auto;
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

        .chatbot-title svg {
            width: 24px;
            height: 24px;
        }

        .chatbot-actions button {
            background: none;
            border: none;
            color: var(--white);
            cursor: pointer;
            opacity: 0.8;
            padding: 4px;
            transition: opacity 0.2s;
        }

        .chatbot-actions button:hover {
            opacity: 1;
        }

        .chatbot-actions button svg {
            width: 20px;
            height: 20px;
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

        .message.typing {
            align-self: flex-start;
            color: var(--text-medium);
        }

        .message.typing span {
            display: inline-block;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background-color: var(--primary-medium);
            margin: 0 2px;
            animation: typing-blink 1.4s infinite both;
        }

        .message.typing span:nth-child(2) {
            animation-delay: 0.2s;
        }

        .message.typing span:nth-child(3) {
            animation-delay: 0.4s;
        }

        @keyframes typing-blink {
            0% {
                opacity: 0.2;
            }

            20% {
                opacity: 1;
            }

            100% {
                opacity: 0.2;
            }
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

        #chatbot-input:focus {
            border-color: var(--primary-medium);
            box-shadow: 0 0 0 3px rgba(86, 124, 141, 0.2);
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

        #chatbot-form button:hover {
            background: var(--primary-dark);
        }

        #chatbot-form button svg {
            width: 20px;
            height: 20px;
        }

        @media (max-width: 768px) {
            #chatbot-container {
                bottom: 24px;
                right: 24px;
            }

            #chat-open-button {
                width: 56px;
                height: 56px;
            }

            #chatbot-window {
                width: calc(100vw - 48px);
                max-height: 70vh;
                bottom: 90px;
            }
        }
    </style>
</head>

<body>
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
            <button id="openModalBtn" class="header-btn" aria-label="Add new">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
            </button>
            <button class="header-btn" aria-label="Notifications">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                    <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                </svg>
            </button>
            <button class="header-btn" aria-label="Profile">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
            </button>
        </div>
    </header>

    <main class="container">
        <section class="welcome-card">
            <div class="welcome-content">
                <div class="welcome-text">
                    <div class="welcome-date">{{ $current_date }}</div>
                    @if($time_of_day == 'bulan')
                        <h2>Selamat Malam, {{ $user_name }}</h2>
                        <p>Waktunya istirahat dan me-review materi hari ini.</p>
                    @else
                        <h2>Selamat Pagi, {{ $user_name }}</h2>
                        <p>Waktunya upgrade dirimu lewat pembelajaran digital!</p>
                    @endif
                </div>
                <div class="welcome-icon">
                    @if($time_of_day == 'bulan')
                        <img src="{{ asset('images/bulan.png') }}" alt="Ilustrasi Bulan">
                    @else
                        <img src="{{ asset('images/matahari.png') }}" alt="Ilustrasi Matahari">
                    @endif
                </div>
            </div>
        </section>

        <section>
            <h3 class="section-title">Overview</h3>
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-book-fill" viewBox="0 0 16 16">
                            <path
                                d="M8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783" />
                        </svg>
                    </div>
                    <h3>{{ $stats['materi'] }}</h3>
                    <p>Materi</p>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-list-task" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M2 2.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5V3a.5.5 0 0 0-.5-.5zM3 3H2v1h1z" />
                            <path
                                d="M5 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M5.5 7a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1zm0 4a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1z" />
                            <path fill-rule="evenodd"
                                d="M1.5 7a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5zM2 7h1v1H2zm0 3.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm1 .5H2v1h1z" />
                        </svg>
                    </div>
                    <h3>{{ $stats['tugas'] }}</h3>
                    <p>Tugas</p>
                </div>
                <div class="stat-card">
                    <div class="stat-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-clipboard-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M10 1.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5zm-5 0A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5v1A1.5 1.5 0 0 1 9.5 4h-3A1.5 1.5 0 0 1 5 2.5zm-2 0h1v1A2.5 2.5 0 0 0 6.5 5h3A2.5 2.5 0 0 0 12 2.5v-1h1a2 2 0 0 1 2 2V14a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V3.5a2 2 0 0 1 2-2" />
                        </svg>
                    </div>
                    <h3>{{ $stats['ujian'] }}</h3>
                    <p>Ujian</p>
                </div>
            </div>
        </section>

        <section>
            <h3 class="section-title">My Course</h3>
            <div class="courses-grid">
                @forelse($courses as $course)
                    <div class="course-card">
                        <div class="course-header">
                            <h4 class="course-title">{{ $course['title'] }}</h4>
                            <button class="course-menu" aria-label="Course Options">
                                <svg viewBox="0 0 24 24" fill="currentColor">
                                    <circle cx="12" cy="12" r="1.5" />
                                    <circle cx="12" cy="5" r="1.5" />
                                    <circle cx="12" cy="19" r="1.5" />
                                </svg>
                            </button>
                        </div>
                        <div class="course-progress">
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: {{ $course['progress'] }}%"></div>
                            </div>
                        </div>
                        <div class="course-info">
                            <div class="course-detail">
                                <svg class="course-detail-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                    <polyline points="14 2 14 8 20 8"></polyline>
                                    <line x1="16" y1="13" x2="8" y2="13"></line>
                                    <line x1="16" y1="17" x2="8" y2="17"></line>
                                </svg>
                                <span>{{ $course['content_count'] }} Content</span>
                            </div>
                            <div class="course-detail">
                                <svg class="course-detail-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                <span>Teacher: {{ $course['teacher'] }}</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>Anda belum bergabung dengan kelas manapun.</p>
                @endforelse
            </div>
        </section>
    </main>

    <footer class="footer">
        <p>© 2025 Dikembangkan dengan senyuman, oleh SmartPal group.</p>
    </footer>

    <div id="joinCourseModal" class="modal-overlay">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Gabung Kelas Baru 🎓</h3>
                <button id="closeModalBtn" class="close-btn">&times;</button>
            </div>
            <div class="modal-body">
                <p>Masukkan kode unik (token) yang diberikan oleh dosen Anda untuk bergabung ke dalam kelas.</p>
                <form action="#" method="POST" class="modal-form">
                    @csrf
                    <div class="form-group">
                        <label for="kode_kelas">Kode Kelas</label>
                        <input type="text" id="kode_kelas" name="kode_kelas" placeholder="Contoh: a1B2c3D4" required
                            autocomplete="off">
                    </div>
                    <button type="submit" class="submit-btn">Gabung Kelas</button>
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
                <div class="chatbot-actions">
                    <button id="chatbot-expand-btn" aria-label="Expand Chat">
                        <svg class="icon-expand" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path
                                d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3">
                            </path>
                        </svg>
                        <svg class="icon-minimize" style="display:none;" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2">
                            <path
                                d="M8 3v3a2 2 0 0 1-2 2H3m18 0h-3a2 2 0 0 1-2-2V3m0 18v-3a2 2 0 0 1 2-2h3M3 16h3a2 2 0 0 1 2 2v3">
                            </path>
                        </svg>
                    </button>
                </div>
            </div>
            <div id="chatbot-body" class="chatbot-body">
                <div class="message bot">
                    <p>Halo {{ $user_name }}! Ada yang bisa saya bantu? Anda bisa bertanya tentang materi, tugas, atau
                        jadwal.</p>
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


    <script>
        // =================================================================
        //   JAVASCRIPT UTAMA & ANIMASI
        // =================================================================
        document.addEventListener('DOMContentLoaded', function () {
            const progressFills = document.querySelectorAll('.progress-fill');
            progressFills.forEach(bar => {
                const targetWidth = bar.style.width;
                bar.style.width = '0%';
                setTimeout(() => {
                    bar.style.transition = 'width 1.5s cubic-bezier(0.25, 1, 0.5, 1)';
                    bar.style.width = targetWidth;
                }, 300);
            });

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                    }
                });
            }, { threshold: 0.1 });

            document.querySelectorAll('.stat-card, .course-card').forEach(card => {
                card.classList.add('fade-in-up');
                observer.observe(card);
            });
        });

        const style = document.createElement('style');
        style.innerHTML = `
            .fade-in-up { opacity: 0; transform: translateY(20px); transition: opacity 0.6s ease-out, transform 0.6s ease-out; }
            .fade-in-up.is-visible { opacity: 1; transform: translateY(0); }
        `;
        document.head.appendChild(style);


        // =================================================================
        //   JAVASCRIPT UNTUK MODAL JOIN COURSE
        // =================================================================
        const openModalBtn = document.getElementById('openModalBtn');
        const closeModalBtn = document.getElementById('closeModalBtn');
        const joinCourseModal = document.getElementById('joinCourseModal');

        if (openModalBtn) {
            openModalBtn.addEventListener('click', () => {
                joinCourseModal.classList.add('active');
            });
        }
        if (closeModalBtn) {
            closeModalBtn.addEventListener('click', () => {
                joinCourseModal.classList.remove('active');
            });
        }
        if (joinCourseModal) {
            joinCourseModal.addEventListener('click', (event) => {
                if (event.target === joinCourseModal) {
                    joinCourseModal.classList.remove('active');
                }
            });
        }


        // =================================================================
        //   JAVASCRIPT UNTUK CHATBOT
        // =================================================================
        const chatOpenButton = document.getElementById('chat-open-button');
        const chatbotWindow = document.getElementById('chatbot-window');
        const chatOpenIcon = document.getElementById('chat-open-icon');
        const chatCloseIcon = document.getElementById('chat-close-icon');
        const expandBtn = document.getElementById('chatbot-expand-btn');
        const iconExpand = expandBtn.querySelector('.icon-expand');
        const iconMinimize = expandBtn.querySelector('.icon-minimize');
        const chatBody = document.getElementById('chatbot-body');
        const chatForm = document.getElementById('chatbot-form');
        const chatInput = document.getElementById('chatbot-input');

        chatOpenButton.addEventListener('click', () => {
            chatbotWindow.classList.toggle('active');
            chatOpenIcon.style.display = chatbotWindow.classList.contains('active') ? 'none' : 'block';
            chatCloseIcon.style.display = chatbotWindow.classList.contains('active') ? 'block' : 'none';
        });

        expandBtn.addEventListener('click', () => {
            chatbotWindow.classList.toggle('expanded');
            iconExpand.style.display = chatbotWindow.classList.contains('expanded') ? 'none' : 'block';
            iconMinimize.style.display = chatbotWindow.classList.contains('expanded') ? 'block' : 'none';
        });

        const scrollToBottom = () => { chatBody.scrollTop = chatBody.scrollHeight; }

        const addUserMessage = (message) => {
            const messageElement = document.createElement('div');
            messageElement.className = 'message user';
            messageElement.innerHTML = `<p>${message}</p>`;
            chatBody.appendChild(messageElement);
            scrollToBottom();
        }

        const addBotMessage = (message) => {
            const typingElement = document.createElement('div');
            typingElement.className = 'message typing';
            typingElement.innerHTML = `<span></span><span></span><span></span>`;
            chatBody.appendChild(typingElement);
            scrollToBottom();

            setTimeout(() => {
                chatBody.removeChild(typingElement);
                const messageElement = document.createElement('div');
                messageElement.className = 'message bot';
                messageElement.innerHTML = `<p>${message}</p>`;
                chatBody.appendChild(messageElement);
                scrollToBottom();
            }, 1500);
        }

        chatForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const userInput = chatInput.value.trim();
            if (userInput) {
                addUserMessage(userInput);
                chatInput.value = '';
                getBotResponse(userInput);
            }
        });

        const getBotResponse = (userInput) => {
            const lowerInput = userInput.toLowerCase();
            let botReply = "Maaf, saya belum mengerti pertanyaan itu. Coba tanya tentang 'materi' atau 'tugas'.";
            if (lowerInput.includes('materi')) {
                botReply = "Tentu, materi pelajaran tersedia di halaman 'My Course'. Anda bisa memilih mata kuliah untuk melihat semua materi yang tersedia.";
            } else if (lowerInput.includes('tugas')) {
                botReply = "Untuk melihat daftar tugas, silakan masuk ke halaman 'Tugas & Ujian'. Di sana Anda akan menemukan semua tugas yang perlu dikerjakan beserta tenggat waktunya.";
            } else if (lowerInput.includes('jadwal')) {
                botReply = "Jadwal perkuliahan Anda bisa diakses melalui menu 'Jadwal Kuliah'. Jangan sampai terlewat, ya!";
            } else if (lowerInput.includes('terima kasih') || lowerInput.includes('makasih')) {
                botReply = "Sama-sama! Senang bisa membantu.";
            }
            addBotMessage(botReply);
        }
    </script>
</body>

</html>