<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartPal - Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        :root {
            --dark-blue: #2F4156;
            --light-blue: #567C8D;
            --off-white: #C8D9E6;
        }

        body {
            background-color: var(--dark-blue);
            color: var(--off-white);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .header {
            background-color: var(--dark-blue);
            color: var(--off-white);
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header .navbar-brand {
            color: var(--off-white);
            font-weight: bold;
        }

        .header-actions a {
            color: var(--off-white);
            text-decoration: none;
            margin-left: 1rem;
        }

        .profile-card {
            background: linear-gradient(135deg, var(--light-blue) 0%, var(--dark-blue) 100%);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            text-align: center;
            margin: auto;
            max-width: 600px;
        }

        .profile-icon {
            width: 120px;
            height: 120px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid rgba(255, 255, 255, 0.2);
            position: relative;
        }

        .profile-icon svg {
            color: var(--off-white);
            width: 60px;
            height: 60px;
        }

        .edit-icon {
            position: absolute;
            bottom: 10px;
            right: 10px;
            width: 30px;
            height: 30px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .edit-icon i {
            font-size: 14px;
            color: white;
        }

        .profile-card h2 {
            font-weight: bold;
            color: white;
            margin-bottom: 2rem;
        }

        .form-section-title {
            text-align: left;
            font-size: 1.1rem;
            font-weight: bold;
            color: white;
            margin-bottom: 1rem;
            margin-top: 2rem;
        }

        .form-control {
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            padding: 15px;
            border-radius: 10px;
        }

        .form-control::placeholder {
            color: var(--off-white);
            opacity: 0.7;
        }

        .form-control:focus {
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
            border-color: var(--off-white);
            box-shadow: none;
        }

        .input-group-text-custom {
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: var(--off-white);
            padding: 15px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .input-group-text-custom i {
            color: var(--off-white);
        }

        .btn-save {
            background: linear-gradient(90deg, var(--off-white), var(--light-blue));
            border: none;
            color: var(--dark-blue);
            font-weight: bold;
            padding: 15px;
            border-radius: 10px;
            width: 100%;
            margin-top: 2rem;
        }

        .footer {
            background-color: var(--dark-blue);
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
            <a href="{{ route('logout') }}">Logout</a>
        </div>
    </div>

    <div class="container d-flex justify-content-center align-items-center" style="flex: 1;">
        <div class="profile-card">
            <div class="profile-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M5.52 19c.64-2.2 1.84-3.5 3.55-4.5.34-.17.65-.33.97-.5a.8.8 0 0 1 .46-.08c.36 0 .8.2 1.34.52s1.42 1.22 2.76 1.84a12.63 12.63 0 0 0 4.2-.4" />
                    <circle cx="12" cy="7" r="4" />
                </svg>
                <div class="edit-icon"><i class="fas fa-pen"></i></div>
            </div>
            <h2>Profil</h2>

            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="First name" name="first_name"
                            value="{{ $user->first_name }}">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="Last name" name="last_name"
                            value="{{ $user->last_name }}">
                    </div>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Username" name="username"
                        value="{{ $user->username }}">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Status" name="status" value="{{ $user->role }}"
                        disabled>
                </div>

                <h3 class="form-section-title">Ganti Password</h3>
                <div class="mb-3">
                    <div class="input-group">
                        <input type="password" class="form-control" placeholder="Masukkan Password Lama"
                            name="old_password">
                        <span class="input-group-text-custom"><i class="fas fa-sync-alt"></i></span>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="input-group">
                        <input type="password" class="form-control" placeholder="Masukkan Password Baru"
                            name="new_password">
                        <span class="input-group-text-custom"><i class="fas fa-sync-alt"></i></span>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="input-group">
                        <input type="password" class="form-control" placeholder="Konfirmasi Password Baru"
                            name="new_password_confirmation">
                        <span class="input-group-text-custom"><i class="fas fa-sync-alt"></i></span>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-save">Simpan</button>
            </form>
        </div>
    </div>

    <div class="footer">
        © 2025 Dikembangkan dengan senyuman, oleh SmartPal group.
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>