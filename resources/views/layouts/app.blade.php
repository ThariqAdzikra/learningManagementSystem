<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS Dosen</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <style>
        body { background-color: #f1f5f9; display: flex; flex-direction: column; min-height: 100vh; }
        main { flex: 1; }
        .bg-slate-700 { background-color: #334155 !important; }
        .bg-slate-800 { background-color: #1e293b !important; }
        .text-orange-400 { color: #fb923c !important; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-slate-800 navbar-dark shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="{{ route('dosen.dashboard') }}">SmartPal</a>
            <div class="d-flex align-items-center">
                <span class="navbar-text text-white small me-3">{{ \Carbon\Carbon::now('Asia/Jakarta')->format('H:i') }}</span>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>

    <footer class="bg-slate-800 text-white-50 text-center py-3">
        <div class="container">
            <small>&copy; {{ date('Y') }} SmartPal. All Rights Reserved.</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>