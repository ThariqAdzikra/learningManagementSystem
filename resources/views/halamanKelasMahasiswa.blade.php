<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $classroom->name ?? 'Halaman Kelas' }} - SmartPal</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        /* Color Variables */
        :root {
            --primary-dark: #2F4156;
            --primary-medium: #567C8D;
            --primary-light: #C8D9E6;
            --background-light: #F5EFEB;
            --white: #FFFFFF;
            --text-dark: #2F4156;
            --text-medium: #567C8D;
            --shadow: rgba(47, 65, 86, 0.1);
            --success: #10B981;
            --warning: #F59E0B;
            --danger: #EF4444;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: var(--background-light);
            color: var(--text-dark);
            line-height: 1.6;
        }

        /* Navigation */
        .navbar {
            background-color: var(--primary-dark);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 10px var(--shadow);
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-brand h2 {
            color: var(--white);
            font-weight: 600;
        }

        .nav-actions {
            display: flex;
            gap: 1rem;
        }

        .nav-btn {
            background: transparent;
            border: none;
            color: var(--white);
            padding: 0.75rem;
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 44px;
            height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .nav-btn:hover {
            background-color: var(--primary-medium);
            transform: translateY(-2px);
        }

        .profile-btn {
            background-color: var(--primary-medium);
        }

        /* Main Content */
        .main-content {
            min-height: calc(100vh - 120px);
            padding: 2rem 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        /* Class Header */
        .class-header {
            background: linear-gradient(135deg, var(--primary-medium), var(--primary-dark));
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 2rem;
            color: var(--white);
            position: relative;
            overflow: hidden;
        }

        .class-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            transform: rotate(45deg);
        }

        .class-header h1 {
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            position: relative;
            z-index: 1;
        }

        .class-header p {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            opacity: 0.9;
            position: relative;
            z-index: 1;
        }

        .header-menu {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: transparent;
            border: none;
            color: var(--white);
            padding: 0.5rem;
            border-radius: 50%;
            cursor: pointer;
            z-index: 2;
            transition: all 0.3s ease;
        }

        .header-menu:hover {
            background-color: rgba(255, 255, 255, 0.2);
            transform: rotate(90deg);
        }

        /* Class Statistics */
        .class-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: var(--white);
            padding: 1.5rem;
            border-radius: 16px;
            text-align: center;
            box-shadow: 0 4px 20px var(--shadow);
            border: 1px solid var(--primary-light);
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 30px var(--shadow);
        }

        .stat-card h3 {
            font-size: 2rem;
            color: var(--primary-dark);
            margin-bottom: 0.5rem;
            font-weight: 700;
        }

        .stat-card p {
            color: var(--text-medium);
            font-size: 0.9rem;
        }

        /* Assignments Container */
        .assignments-container {
            background: var(--white);
            border-radius: 20px;
            padding: 1.5rem;
            box-shadow: 0 4px 20px var(--shadow);
        }

        .assignments-container h2 {
            color: var(--primary-dark);
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
            font-weight: 600;
        }

        /* Assignment Cards */
        .assignment-card {
            display: flex;
            align-items: center;
            padding: 1.25rem;
            margin-bottom: 1rem;
            background: var(--white);
            border: 2px solid var(--primary-light);
            border-radius: 16px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .assignment-card::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: var(--primary-medium);
            transition: all 0.3s ease;
        }

        .assignment-card:hover {
            transform: translateX(8px);
            box-shadow: 0 6px 25px var(--shadow);
            border-color: var(--primary-medium);
        }

        .assignment-card:hover::before {
            width: 8px;
            background: var(--primary-dark);
        }

        .assignment-card.completed {
            opacity: 0.8;
            border-color: var(--success);
        }

        .assignment-card.completed::before {
            background: var(--success);
        }

        .assignment-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--primary-light), var(--primary-medium));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            position: relative;
            flex-shrink: 0;
        }

        .assignment-icon i {
            font-size: 1.2rem;
            color: var(--primary-dark);
        }

        .notification-dot {
            position: absolute;
            top: -2px;
            right: -2px;
            width: 12px;
            height: 12px;
            background: var(--danger);
            border-radius: 50%;
            border: 2px solid var(--white);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
                opacity: 1;
            }

            50% {
                transform: scale(1.1);
                opacity: 0.7;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        .assignment-content {
            flex: 1;
            min-width: 0;
        }

        .assignment-info h3 {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 0.25rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .assignment-date {
            font-size: 0.85rem;
            color: var(--text-medium);
            margin-bottom: 0.5rem;
        }

        .assignment-description {
            font-size: 0.9rem;
            color: var(--text-medium);
            line-height: 1.4;
            margin-bottom: 0.5rem;
        }

        .assignment-meta {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            flex-wrap: wrap;
        }

        .due-date {
            font-size: 0.85rem;
            color: var(--text-medium);
            font-weight: 500;
        }

        .score {
            background: linear-gradient(135deg, var(--success), #059669);
            color: var(--white);
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        /* Badges */
        .badge {
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .badge.completed {
            background: var(--success);
            color: var(--white);
        }

        .badge.pending {
            background: var(--warning);
            color: var(--white);
        }

        .badge.overdue {
            background: var(--danger);
            color: var(--white);
        }

        /* Assignment Actions */
        .assignment-actions {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-left: 1rem;
        }

        .btn {
            border: none;
            padding: 0.5rem;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }

        .btn-complete {
            background: var(--success);
            color: var(--white);
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-complete:hover {
            background: #059669;
            transform: scale(1.05);
        }

        .assignment-menu {
            background: transparent;
            border: none;
            color: var(--text-medium);
            padding: 0.5rem;
            border-radius: 50%;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .assignment-menu:hover {
            background-color: var(--primary-light);
            color: var(--primary-dark);
            transform: rotate(90deg);
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 3rem 2rem;
            color: var(--text-medium);
        }

        .empty-state i {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        .empty-state h3 {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
            color: var(--text-dark);
        }

        .empty-state p {
            font-size: 1rem;
            line-height: 1.6;
        }

        /* Floating Button */
        .floating-btn {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--primary-medium), var(--primary-dark));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            box-shadow: 0 6px 20px var(--shadow);
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 1000;
        }

        .floating-btn:hover {
            transform: scale(1.1) translateY(-2px);
            box-shadow: 0 8px 30px var(--shadow);
        }

        .floating-btn i {
            font-size: 1.25rem;
        }

        /* Footer */
        .footer {
            background-color: var(--primary-dark);
            color: var(--white);
            text-align: center;
            padding: 1.5rem 0;
            margin-top: 2rem;
        }

        .footer p {
            opacity: 0.8;
            font-size: 0.9rem;
        }

        /* Loading Animation */
        .fade-in {
            animation: fadeInAnimation 0.8s ease-in-out forwards;
            opacity: 0;
        }

        @keyframes fadeInAnimation {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding: 0 1rem;
            }

            .nav-container {
                padding: 0 1rem;
            }

            .class-header {
                padding: 1.5rem;
                margin-bottom: 1.5rem;
            }

            .class-header h1 {
                font-size: 1.5rem;
            }

            .assignment-card {
                padding: 1rem;
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .assignment-info h3 {
                white-space: normal;
            }

            .assignment-meta {
                width: 100%;
                justify-content: space-between;
            }

            .class-stats {
                grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            }

            .floating-btn {
                bottom: 1rem;
                right: 1rem;
                width: 50px;
                height: 50px;
            }
        }

        @media (max-width: 480px) {
            .assignments-container {
                padding: 1rem;
            }

            .class-header {
                border-radius: 16px;
            }

            .assignment-card {
                border-radius: 12px;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-brand">
                <h2>SmartPal</h2>
            </div>
            <div class="nav-actions">
                <button class="nav-btn"><i class="fas fa-plus"></i></button>
                <button class="nav-btn"><i class="fas fa-bell"></i></button>
                <button class="nav-btn profile-btn"><i class="fas fa-user"></i></button>
            </div>
        </div>
    </nav>

    <main class="main-content">
        <div class="container">
            @if(isset($classroom))
                <div class="class-header fade-in">
                    <h1>{{ $classroom->name }}</h1>
                    <p><i class="fas fa-user"></i> Teacher: {{ $classroom->teacher }}</p>
                    <button class="header-menu"><i class="fas fa-ellipsis-v"></i></button>
                </div>

                <div class="class-stats fade-in" style="animation-delay: 0.1s;">
                    <div class="stat-card">
                        <h3>{{ $classroom->assignments->where('type', 'tugas')->count() }}</h3>
                        <p>Total Tugas</p>
                    </div>
                    <div class="stat-card">
                        <h3>{{ $classroom->assignments->where('type', 'quiz')->count() }}</h3>
                        <p>Quiz</p>
                    </div>
                    <div class="stat-card">
                        <h3>{{ $classroom->assignments->where('is_completed', true)->count() }}</h3>
                        <p>Selesai</p>
                    </div>
                </div>

                <div class="assignments-container fade-in" style="animation-delay: 0.2s;">
                    <h2>Daftar Tugas & Materi</h2>

                    @forelse($classroom->assignments as $index => $assignment)
                        <div class="assignment-card {{ $assignment->is_completed ? 'completed' : '' }} fade-in"
                            style="animation-delay: {{ 0.3 + ($index * 0.1) }}s;">
                            <div class="assignment-icon">
                                @if($assignment->type === 'tugas')
                                    <i class="fas fa-tasks"></i>
                                @elseif($assignment->type === 'quiz')
                                    <i class="fas fa-question-circle"></i>
                                @else
                                    <i class="fas fa-book"></i>
                                @endif

                                @if(!$assignment->is_completed && $assignment->due_date && $assignment->due_date->isToday())
                                    <span class="notification-dot"></span>
                                @endif
                            </div>

                            <div class="assignment-content">
                                <div class="assignment-info">
                                    <h3>{{ $assignment->title }}</h3>
                                    <p class="assignment-date">{{ $assignment->created_date->format('l, d F Y') }}</p>
                                    @if($assignment->description)
                                        <p class="assignment-description">{{ $assignment->description }}</p>
                                    @endif
                                </div>

                                <div class="assignment-meta">
                                    @if(method_exists($assignment, 'getStatusBadge'))
                                        {!! $assignment->getStatusBadge() !!}
                                    @endif
                                    @if($assignment->score)
                                        <span class="score">{{ $assignment->score }}/100</span>
                                    @endif
                                    @if($assignment->due_date)
                                        <p class="due-date">Due: {{ $assignment->due_date->format('l, d F Y') }}</p>
                                    @endif
                                </div>
                            </div>

                            <div class="assignment-actions">
                                @if(!$assignment->is_completed && Route::has('assignments.complete'))
                                    <form action="{{ route('assignments.complete', $assignment->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-complete">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    </form>
                                @endif
                                <button class="assignment-menu">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                            </div>
                        </div>
                    @empty
                        <div class="empty-state">
                            <i class="fas fa-clipboard-list"></i>
                            <h3>Belum ada tugas</h3>
                            <p>Kelas ini belum memiliki tugas atau materi.</p>
                        </div>
                    @endforelse
                </div>
            @else
                <div class="empty-state">
                    <i class="fas fa-school"></i>
                    <h3>Kelas tidak ditemukan</h3>
                    <p>Silakan kembali ke dashboard dan pilih kelas yang valid.</p>
                </div>
            @endif
        </div>
    </main>

    <footer class="footer">
        <p>&copy; {{ date('Y') }} Dikembangkan dengan senyuman, oleh SmartPal group.</p>
    </footer>

    <div class="floating-btn">
        <i class="fas fa-clock"></i>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Logika untuk menampilkan alert sederhana saat tombol diklik
            const navButtons = document.querySelectorAll('.nav-btn, .header-menu, .assignment-menu, .floating-btn');

            navButtons.forEach(button => {
                button.addEventListener('click', function (event) {
                    event.preventDefault();
                    const iconClass = this.querySelector('i').classList[1]; // Ambil nama ikon
                    alert('Tombol ' + iconClass.replace('fa-', '') + ' diklik! Fitur ini sedang dalam pengembangan.');
                });
            });

            // Animasi untuk elemen yang masuk saat di-scroll
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, {
                threshold: 0.1
            });

            // Tambahkan class 'fade-in' untuk di-observe
            document.querySelectorAll('.fade-in').forEach(el => {
                observer.observe(el);
            });
        });

        // Menambahkan style untuk animasi observer
        const style = document.createElement('style');
        style.innerHTML = `
            .fade-in {
                opacity: 0;
                transform: translateY(20px);
                transition: opacity 0.6s ease-out, transform 0.6s ease-out;
            }
            .fade-in.visible {
                opacity: 1;
                transform: translateY(0);
            }
        `;
        document.head.appendChild(style);
    </script>
</body>

</html>