<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Judul dinamis berdasarkan nama kelas --}}
    <title>SmartPal - {{ $course->name }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    {{-- Mengadopsi semua style dari dashboardDosen.blade.php --}}
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

        /* Header Styles - Diambil dari dashboardDosen */
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

        /* Section Titles */
        .section-title {
            font-size: 24px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 24px;
            letter-spacing: -0.02em;
        }

        /* Course Header Card */
        .course-header-card {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-medium));
            border-radius: 24px;
            padding: 30px 40px;
            margin-bottom: 40px;
            color: var(--white);
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 8px 32px var(--shadow-medium);
        }

        .course-header-card .back-button {
            width: 44px;
            height: 44px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            color: var(--white);
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 20px;
            transition: all 0.3s ease;
        }

        .course-header-card .back-button:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .course-header-card h2 {
            font-size: 28px;
            font-weight: 700;
            margin: 0;
            letter-spacing: -0.02em;
        }

        .course-header-card p {
            font-size: 16px;
            opacity: 0.8;
            margin: 5px 0 0 0;
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
        }

        .stat-icon i {
            font-size: 2rem;
            color: var(--primary-medium);
        }

        .stat-card h3 {
            font-size: 2.25rem;
            font-weight: 700;
            color: var(--text-dark);
            margin: 12px 0 4px;
        }

        .stat-card p {
            color: var(--text-medium);
            font-size: 1rem;
        }

        /* Custom Tabs Styling */
        .custom-tabs {
            display: flex;
            background-color: var(--primary-light);
            padding: 8px;
            border-radius: 50px;
            margin-bottom: 30px;
            gap: 8px;
        }

        .custom-tabs .tab-link {
            flex: 1;
            text-align: center;
            padding: 12px 20px;
            border: none;
            background: transparent;
            color: var(--text-medium);
            font-weight: 600;
            font-size: 16px;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .custom-tabs .tab-link.active {
            background: linear-gradient(135deg, var(--primary-medium), var(--primary-dark));
            color: var(--white);
            box-shadow: 0 4px 15px var(--shadow-medium);
        }

        .tab-content .tab-pane {
            display: none;
        }

        .tab-content .tab-pane.active {
            display: block;
            animation: fadeInUp 0.5s ease;
        }

        /* Content Card Styling */
        .content-card {
            background: var(--white);
            border-radius: 20px;
            padding: 32px;
            box-shadow: 0 6px 24px var(--shadow-light);
            border: 1px solid rgba(200, 217, 230, 0.3);
        }

        .content-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .content-card-header h5 {
            font-size: 20px;
            font-weight: 700;
            margin: 0;
        }

        .primary-btn {
            background: linear-gradient(135deg, var(--primary-medium), var(--primary-dark));
            color: var(--white);
            border: none;
            border-radius: 10px;
            padding: 10px 20px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .primary-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px var(--shadow-medium);
        }

        /* List Item Styling (for students, materials, etc.) */
        .list-item {
            background: linear-gradient(135deg, var(--accent-cream), #fff);
            border-radius: 12px;
            padding: 16px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 12px;
            transition: all 0.3s ease;
        }

        .list-item:hover {
            transform: translateX(5px);
            box-shadow: 0 4px 15px var(--shadow-light);
        }

        .list-item-content {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .list-item-icon {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: var(--primary-dark);
            color: var(--white);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            font-weight: bold;
        }

        .list-item-details h6 {
            font-size: 16px;
            font-weight: 600;
            margin: 0;
        }

        .list-item-details p {
            font-size: 14px;
            color: var(--text-medium);
            margin: 2px 0 0;
        }

        .danger-btn {
            background: #ef4444;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 6px 12px;
            font-size: 14px;
            cursor: pointer;
            transition: background 0.2s;
        }

        .danger-btn:hover {
            background: #dc2626;
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

        /* CSS UNTUK CHATBOT - Diambil dari dashboardDosen */
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

        /* Animasi */
        .fade-in-up {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }

        .fade-in-up.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    @extends('layouts.app')

    @section('content')
        {{-- Header - Diambil dari dashboardDosen --}}
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
                {{-- Tombol 'Tambah Kelas' tidak diperlukan di sini, bisa di-disable/dihilangkan --}}
                <a href="{{ route('dosen.dashboard') }}" class="header-btn" title="Kembali ke Dashboard">
                    <i class="fas fa-th-large"></i>
                </a>
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
            {{-- Header Halaman Kelas yang Baru --}}
            <section class="course-header-card fade-in-up">
                <div class="d-flex align-items-center">
                    <a href="{{ route('dosen.dashboard') }}" class="back-button">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    <div>
                        <h2>{{ $course->name }}</h2>
                        <p>{{ $course->code }} • {{ $course->schedule ?? 'Jadwal belum diatur' }}</p>
                    </div>
                </div>
            </section>

            {{-- Statistik Kelas --}}
            <section>
                <div class="stats-grid">
                    <div class="stat-card fade-in-up">
                        <div class="stat-icon"><i class="fas fa-users"></i></div>
                        <h3>{{ $course->students->count() }}</h3>
                        <p>Mahasiswa</p>
                    </div>
                    <div class="stat-card fade-in-up">
                        <div class="stat-icon"><i class="fas fa-book-open"></i></div>
                        <h3>{{ $course->materials->count() }}</h3>
                        <p>Materi</p>
                    </div>
                    <div class="stat-card fade-in-up">
                        <div class="stat-icon"><i class="fas fa-tasks"></i></div>
                        <h3>{{ $course->assignments->count() }}</h3>
                        <p>Tugas</p>
                    </div>
                    <div class="stat-card fade-in-up">
                        <div class="stat-icon"><i class="fas fa-calendar-alt"></i></div>
                        {{-- Data dummy untuk pertemuan --}}
                        <h3>8/16</h3>
                        <p>Pertemuan</p>
                    </div>
                </div>
            </section>

            {{-- Navigasi Tab Baru --}}
            <section class="custom-tabs fade-in-up">
                <button class="tab-link active" data-tab="mahasiswa"><i class="fas fa-users me-2"></i>Mahasiswa</button>
                <button class="tab-link" data-tab="materi"><i class="fas fa-book me-2"></i>Materi</button>
                <button class="tab-link" data-tab="tugas"><i class="fas fa-tasks me-2"></i>Tugas</button>
                <button class="tab-link" data-tab="nilai"><i class="fas fa-chart-line me-2"></i>Nilai</button>
            </section>

            {{-- Konten Tab --}}
            <section class="tab-content">
                {{-- Tab Mahasiswa --}}
                <div id="mahasiswa" class="tab-pane active">
                    <div class="content-card">
                        <div class="content-card-header">
                            <h5>Daftar Mahasiswa</h5>
                            <button class="primary-btn"><i class="fas fa-plus me-2"></i>Tambah Mahasiswa</button>
                        </div>
                        @forelse ($course->students as $student)
                            <div class="list-item">
                                <div class="list-item-content">
                                    <div class="list-item-icon">{{ substr($student->first_name, 0, 1) }}</div>
                                    <div class="list-item-details">
                                        <h6>{{ $student->first_name }} {{ $student->last_name }}</h6>
                                        <p>NIM: {{ $student->username }}</p>
                                    </div>
                                </div>
                                <button class="danger-btn"><i class="fas fa-trash me-1"></i>Hapus</button>
                            </div>
                        @empty
                            <p class="text-center text-muted mt-4">Belum ada mahasiswa yang terdaftar di kelas ini.</p>
                        @endforelse
                    </div>
                </div>

                {{-- Tab Materi --}}
                <div id="materi" class="tab-pane">
                    <div class="content-card">
                        <div class="content-card-header">
                            <h5>Materi Pembelajaran</h5>
                            <button class="primary-btn"><i class="fas fa-upload me-2"></i>Upload Materi</button>
                        </div>
                        @forelse ($course->materials as $material)
                            <div class="list-item">
                                <div class="list-item-content">
                                    <div class="list-item-icon"><i class="fas fa-file-alt"></i></div>
                                    <div class="list-item-details">
                                        <h6>{{ $material->title }}</h6>
                                        <p>Diunggah pada: {{ $material->created_at->format('d M Y') }}</p>
                                    </div>
                                </div>
                                <div>
                                    <a href="#" class="primary-btn" style="background: #22c55e;">Lihat</a>
                                    <button class="danger-btn" style="margin-left: 8px;">Hapus</button>
                                </div>
                            </div>
                        @empty
                            <p class="text-center text-muted mt-4">Belum ada materi yang diunggah untuk kelas ini.</p>
                        @endforelse
                    </div>
                </div>

                {{-- Tab Tugas --}}
                <div id="tugas" class="tab-pane">
                    <div class="content-card">
                        <div class="content-card-header">
                            <h5>Tugas & Ujian</h5>
                            <button class="primary-btn"><i class="fas fa-plus me-2"></i>Buat Tugas</button>
                        </div>
                        @forelse ($course->assignments as $assignment)
                            <div class="list-item">
                                <div class="list-item-content">
                                    <div class="list-item-icon"><i class="fas fa-clipboard-list"></i></div>
                                    <div class="list-item-details">
                                        <h6>{{ $assignment->title }}</h6>
                                        <p>Deadline:
                                            {{ \Carbon\Carbon::parse($assignment->due_date)->translatedFormat('l, d F Y H:i') }}
                                        </p>
                                    </div>
                                </div>
                                <div>
                                    <a href="#" class="primary-btn">Detail</a>
                                </div>
                            </div>
                        @empty
                            <p class="text-center text-muted mt-4">Belum ada tugas yang dibuat untuk kelas ini.</p>
                        @endforelse
                    </div>
                </div>

                {{-- Tab Nilai --}}
                <div id="nilai" class="tab-pane">
                    <div class="content-card">
                        <div class="content-card-header">
                            <h5>Rekap Nilai</h5>
                            <button class="primary-btn"><i class="fas fa-download me-2"></i>Ekspor Nilai</button>
                        </div>
                        <p class="text-center text-muted mt-4">Fitur rekapitulasi nilai sedang dalam pengembangan.</p>
                    </div>
                </div>

            </section>
        </main>

        {{-- Footer - Diambil dari dashboardDosen --}}
        <footer class="footer">
            <p>&copy; 2025 Dikembangkan dengan senyuman, oleh SmartPal group.</p>
        </footer>

        {{-- Chatbot - Diambil dari dashboardDosen --}}
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
                        {{-- Menggunakan nama dosen dari data user --}}
                        <p>Halo {{ Auth::user()->first_name }}! Ada yang bisa saya bantu terkait kelas {{ $course->name }}?
                        </p>
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
                }, { threshold: 0.1 });
                document.querySelectorAll('.course-header-card, .stat-card, .custom-tabs, .content-card').forEach(el => {
                    el.classList.add('fade-in-up');
                    observer.observe(el);
                });

                // --- LOGIKA UNTUK TAB BARU ---
                const tabLinks = document.querySelectorAll('.tab-link');
                const tabPanes = document.querySelectorAll('.tab-pane');

                tabLinks.forEach(link => {
                    link.addEventListener('click', () => {
                        const tabId = link.getAttribute('data-tab');

                        // Nonaktifkan semua link dan pane
                        tabLinks.forEach(item => item.classList.remove('active'));
                        tabPanes.forEach(pane => pane.classList.remove('active'));

                        // Aktifkan yang diklik
                        link.classList.add('active');
                        document.getElementById(tabId).classList.add('active');
                    });
                });

                // --- LOGIKA UNTUK CHATBOT (SAMA DENGAN DASHBOARD) ---
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
                        chatBody.querySelector('.message.typing')?.remove();
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
                    // Jawaban bot kini lebih kontekstual dengan halaman kelas
                    let botReply = "Maaf, saya belum mengerti. Anda bisa bertanya tentang 'mahasiswa', 'materi', atau 'tugas' di kelas ini.";
                    if (lowerInput.includes('mahasiswa')) {
                        botReply = `Anda bisa melihat daftar mahasiswa dan menambahkan mahasiswa baru di tab 'Mahasiswa'. Saat ini ada {{ $course->students->count() }} mahasiswa di kelas ini.`;
                    } else if (lowerInput.includes('materi')) {
                        botReply = "Semua materi pembelajaran tersedia di tab 'Materi'. Anda juga bisa mengunggah materi baru dari sana.";
                    } else if (lowerInput.includes('tugas')) {
                        botReply = `Untuk mengelola tugas, silakan buka tab 'Tugas'. Anda bisa membuat tugas baru dan melihat detail tugas yang sudah ada.`;
                    } else if (lowerInput.includes('terima kasih')) {
                        botReply = "Sama-sama! Jika ada lagi yang bisa dibantu, jangan ragu bertanya.";
                    }
                    addBotMessage(botReply);
                }
            });
        </script>
    @endpush
</body>

</html>