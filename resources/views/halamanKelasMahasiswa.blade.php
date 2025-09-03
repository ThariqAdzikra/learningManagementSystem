<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $course->name }} - SmartPal</title>
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
        
        form.logout-form {
            display: inline-flex;
        }
        
        /* Container */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 30px;
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
            border-radius: 12px;
            color: var(--white);
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 20px;
            transition: all 0.3s ease;
        }
        .course-header-card .back-button:hover { background: rgba(255, 255, 255, 0.2); }
        .course-header-card h2 { font-size: 28px; font-weight: 700; margin: 0; letter-spacing: -0.02em; }
        .course-header-card p { font-size: 16px; opacity: 0.8; margin: 5px 0 0 0; }
        
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
            flex: 1; text-align: center; padding: 12px 20px; border: none;
            background: transparent; color: var(--text-medium); font-weight: 600;
            font-size: 16px; border-radius: 50px; cursor: pointer; transition: all 0.3s ease;
        }
        .custom-tabs .tab-link.active {
            background: linear-gradient(135deg, var(--primary-medium), var(--primary-dark));
            color: var(--white); box-shadow: 0 4px 15px var(--shadow-medium);
        }
        .tab-content .tab-pane { display: none; }
        .tab-content .tab-pane.active { display: block; animation: fadeInUp 0.5s ease; }
        
        /* Content Card Styling */
        .content-card {
            background: var(--white); border-radius: 20px; padding: 32px;
            box-shadow: 0 6px 24px var(--shadow-light); border: 1px solid rgba(200, 217, 230, 0.3);
        }
        
        /* List Item Styling */
        .list-item {
            background: linear-gradient(135deg, var(--accent-cream), #fff); border-radius: 12px;
            padding: 16px; display: flex; justify-content: space-between; align-items: center;
            margin-bottom: 12px; transition: all 0.3s ease;
        }
        .list-item:hover { transform: translateX(5px); box-shadow: 0 4px 15px var(--shadow-light); }
        .list-item-content { display: flex; align-items: center; gap: 16px; }
        .list-item-icon {
            width: 48px; height: 48px; border-radius: 50%;
            background: var(--primary-dark); color: var(--white);
            display: flex; align-items: center; justify-content: center;
            font-size: 1.2rem;
            flex-shrink: 0;
        }
        .list-item-details h6 { font-size: 16px; font-weight: 600; margin: 0; }
        .list-item-details p { font-size: 14px; color: var(--text-medium); margin: 2px 0 0; }
        
        .primary-btn {
            background: linear-gradient(135deg, var(--primary-medium), var(--primary-dark));
            color: var(--white); border: none; border-radius: 10px; padding: 10px 20px;
            font-size: 15px; font-weight: 600; cursor: pointer; text-decoration: none;
            transition: all 0.3s ease;
        }
        .primary-btn:hover { transform: translateY(-2px); box-shadow: 0 4px 12px var(--shadow-medium); }

        /* Footer */
        .footer {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-medium));
            color: var(--white); text-align: center; padding: 32px 30px; margin-top: 60px;
        }
        .footer p { font-size: 14px; opacity: 0.9; font-weight: 500; }
        
        /* Chatbot CSS */
        #chatbot-container {
            position: fixed; bottom: 32px; right: 32px; z-index: 1000;
        }
        #chat-open-button {
            width: 64px; height: 64px; border-radius: 50%;
            box-shadow: 0 8px 32px var(--shadow-medium);
            display: flex; align-items: center; justify-content: center;
            cursor: pointer; border: none;
            background: linear-gradient(135deg, var(--primary-medium), var(--primary-dark));
            color: var(--white);
        }
        #chat-open-button svg { width: 24px; height: 24px; }
        #chatbot-window {
            position: absolute; bottom: 88px; right: 0; width: 370px;
            max-height: 550px; background-color: var(--white);
            border-radius: 20px; box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            display: flex; flex-direction: column; overflow: hidden;
            opacity: 0; transform: translateY(20px) scale(0.95);
            transform-origin: bottom right;
            transition: opacity 0.3s ease, transform 0.3s ease;
            pointer-events: none;
        }
        #chatbot-window.active {
            opacity: 1; transform: translateY(0) scale(1); pointer-events: auto;
        }
        .chatbot-header {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-medium));
            color: var(--white); padding: 16px 20px;
            display: flex; justify-content: space-between; align-items: center;
            flex-shrink: 0;
        }
        .chatbot-title {
            display: flex; align-items: center; gap: 10px; font-weight: 600; font-size: 18px;
        }
        .chatbot-body {
            flex-grow: 1; padding: 20px; overflow-y: auto;
            display: flex; flex-direction: column; gap: 12px;
        }
        .message {
            max-width: 80%; padding: 10px 16px; border-radius: 18px;
            line-height: 1.5; word-wrap: break-word;
        }
        .message.bot {
            background-color: var(--primary-light); color: var(--text-dark);
            align-self: flex-start; border-bottom-left-radius: 4px;
        }
        .message.user {
            background-color: var(--primary-medium); color: var(--white);
            align-self: flex-end; border-bottom-right-radius: 4px;
        }
        .chatbot-footer { padding: 16px; border-top: 1px solid #e0e0e0; flex-shrink: 0; }
        #chatbot-form { display: flex; gap: 10px; }
        #chatbot-input {
            flex-grow: 1; border: 1px solid var(--primary-light); border-radius: 20px;
            padding: 10px 16px; font-size: 14px; outline: none;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        #chatbot-form button {
            width: 44px; height: 44px; border-radius: 50%; border: none;
            background: var(--primary-medium); color: var(--white); cursor: pointer;
            display: flex; align-items: center; justify-content: center;
            transition: background-color 0.2s; flex-shrink: 0;
        }

        @keyframes fadeInUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
    </style>
</head>
<body>
    @extends('layouts.app')

    @section('content')
        <header class="header">
            <div class="header-brand">
                 <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2L2 7L12 12L22 7L12 2Z" /><path d="M2 17L12 22L22 17" /><path d="M2 12L12 17L22 12" /></svg>
                <h1>SmartPal</h1>
            </div>
            <div class="header-actions">
                <a href="{{ route('mahasiswa.dashboard') }}" class="header-btn" title="Kembali ke Dashboard">
                    <i class="fas fa-th-large"></i>
                </a>
                <a href="{{ route('profile.show') }}" class="header-btn" title="Profil">
                    <i class="fas fa-user"></i>
                </a>
                <form method="POST" action="{{ route('logout') }}" class="logout-form">
                    @csrf
                    <button type="submit" class="header-btn" title="Logout"><i class="fas fa-sign-out-alt"></i></button>
                </form>
            </div>
        </header>

        <main class="container">
            <section class="course-header-card">
                <div class="d-flex align-items-center">
                    <a href="{{ route('mahasiswa.dashboard') }}" class="back-button">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    <div>
                        <h2>{{ $course->name }}</h2>
                        <p>Dosen: {{ $course->dosen->first_name ?? 'N/A' }} {{ $course->dosen->last_name ?? '' }}</p>
                    </div>
                </div>
            </section>

            <section class="custom-tabs">
                <button class="tab-link active" data-tab="materi"><i class="fas fa-book me-2"></i>Materi</button>
                <button class="tab-link" data-tab="tugas"><i class="fas fa-tasks me-2"></i>Tugas</button>
                <button class="tab-link" data-tab="anggota"><i class="fas fa-users me-2"></i>Anggota Kelas</button>
            </section>

            <section class="tab-content">
                {{-- Tab Materi --}}
                <div id="materi" class="tab-pane active">
                    <div class="content-card">
                        @forelse ($course->materials as $material)
                            <div class="list-item">
                                <div class="list-item-content">
                                    <div class="list-item-icon"><i class="fas fa-file-alt"></i></div>
                                    <div class="list-item-details">
                                        <h6>{{ $material->title }}</h6>
                                        <p>Diunggah: {{ $material->created_at->translatedFormat('d F Y') }}</p>
                                    </div>
                                </div>
                                <a href="{{ $material->file_path ? asset('storage/' . $material->file_path) : $material->external_link }}" target="_blank" class="primary-btn">
                                    <i class="fas fa-download me-2"></i> Buka
                                </a>
                            </div>
                        @empty
                            <p class="text-center text-muted mt-4">Belum ada materi yang diunggah untuk kelas ini.</p>
                        @endforelse
                    </div>
                </div>

                {{-- Tab Tugas --}}
                <div id="tugas" class="tab-pane">
                    <div class="content-card">
                        @forelse ($course->assignments as $assignment)
                            <div class="list-item">
                                <div class="list-item-content">
                                    <div class="list-item-icon"><i class="fas fa-clipboard-list"></i></div>
                                    <div class="list-item-details">
                                        <h6>{{ $assignment->title }}</h6>
                                        <p style="color: #EF4444; font-weight: 500;">Deadline: {{ \Carbon\Carbon::parse($assignment->due_date)->translatedFormat('l, d F Y, H:i') }}</p>
                                    </div>
                                </div>
                                <a href="#" class="primary-btn"><i class="fas fa-eye me-2"></i> Lihat Detail</a>
                            </div>
                        @empty
                             <p class="text-center text-muted mt-4">Belum ada tugas yang diberikan di kelas ini.</p>
                        @endforelse
                    </div>
                </div>

                {{-- Tab Anggota --}}
                <div id="anggota" class="tab-pane">
                    <div class="content-card">
                        {{-- Dosen --}}
                        <div class="list-item" style="border-left: 4px solid var(--primary-dark);">
                            <div class="list-item-content">
                                 <div class="list-item-icon" style="background: var(--primary-light); color: var(--primary-dark);"><i class="fas fa-chalkboard-teacher"></i></div>
                                <div class="list-item-details">
                                    <h6>{{ $course->dosen->first_name }} {{ $course->dosen->last_name }}</h6>
                                    <p>Dosen Pengampu</p>
                                </div>
                            </div>
                        </div>
                        {{-- Mahasiswa --}}
                         @foreach ($course->students as $student)
                            <div class="list-item">
                                <div class="list-item-content">
                                    <div class="list-item-icon" style="background: var(--primary-medium);">{{ substr($student->first_name, 0, 1) }}</div>
                                    <div class="list-item-details">
                                        <h6>{{ $student->first_name }} {{ $student->last_name }}</h6>
                                        <p>Mahasiswa</p>
                                    </div>
                                </div>
                            </div>
                         @endforeach
                    </div>
                </div>
            </section>
        </main>

        <footer class="footer">
            <p>© 2025 Dikembangkan dengan senyuman, oleh SmartPal group.</p>
        </footer>

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
                        <p>Halo {{ Auth::user()->first_name }}! Ada yang bisa saya bantu terkait kelas {{ $course->name }}?</p>
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
                // --- LOGIKA UNTUK TAB ---
                const tabLinks = document.querySelectorAll('.tab-link');
                const tabPanes = document.querySelectorAll('.tab-pane');

                tabLinks.forEach(link => {
                    link.addEventListener('click', () => {
                        const tabId = link.getAttribute('data-tab');
                        tabLinks.forEach(item => item.classList.remove('active'));
                        tabPanes.forEach(pane => pane.classList.remove('active'));
                        link.classList.add('active');
                        document.getElementById(tabId).classList.add('active');
                    });
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
                    let botReply = "Maaf, saya belum mengerti. Anda bisa bertanya tentang 'materi', 'tugas', atau 'anggota' di kelas ini.";
                    if (lowerInput.includes('materi')) {
                        botReply = "Semua materi pembelajaran tersedia di tab 'Materi'. Anda bisa mengunduh atau melihatnya langsung dari sana.";
                    } else if (lowerInput.includes('tugas')) {
                        botReply = "Daftar tugas dapat Anda lihat di tab 'Tugas'. Pastikan untuk memperhatikan tenggat waktunya, ya!";
                    } else if (lowerInput.includes('anggota')) {
                        botReply = "Anda bisa melihat siapa saja dosen dan teman-teman yang terdaftar di kelas ini pada tab 'Anggota Kelas'.";
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