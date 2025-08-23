<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartPal - Your Learning Partner</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, var(--light-blue) 0%, var(--dark-blue) 100%);
            padding: 80px 20px;
            text-align: center;
            border-bottom-left-radius: 50px;
            border-bottom-right-radius: 50px;
        }
        .hero-section h1 {
            font-weight: bold;
            font-size: 3rem;
            color: white;
            margin-bottom: 20px;
        }
        .hero-section p {
            font-size: 1.2rem;
            max-width: 600px;
            margin: 0 auto 30px;
            color: var(--off-white);
        }
        .btn-primary-custom {
            background-color: var(--off-white);
            color: var(--dark-blue);
            border: none;
            font-weight: bold;
            padding: 12px 30px;
            border-radius: 50px;
            transition: transform 0.3s ease, background-color 0.3s ease;
        }
        .btn-primary-custom:hover {
            transform: translateY(-3px);
            background-color: #E6F0F5;
        }

        /* Features Section */
        .features-section {
            padding: 60px 20px;
            text-align: center;
        }
        .features-section h2 {
            font-weight: bold;
            color: white;
            margin-bottom: 40px;
        }
        .feature-card {
            background-color: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            padding: 30px;
            transition: transform 0.3s ease;
            height: 100%;
        }
        .feature-card:hover {
            transform: translateY(-5px);
            background-color: rgba(255, 255, 255, 0.1);
        }
        .feature-card svg {
            color: #C8D9E6;
            margin-bottom: 20px;
        }
        .feature-card h3 {
            font-weight: bold;
            color: white;
        }

        /* Testimonials Section */
        .testimonials-section {
            background-color: rgba(255, 255, 255, 0.03);
            padding: 60px 20px;
            text-align: center;
        }
        .testimonial-card {
            background-color: rgba(255, 255, 255, 0.08);
            border-radius: 15px;
            padding: 25px;
        }
        .testimonial-card p {
            font-style: italic;
            margin-bottom: 10px;
        }
        .testimonial-card h5 {
            font-weight: bold;
            color: white;
            margin-bottom: 0;
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
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register</a>
    </div>
</div>

<div class="hero-section">
    <h1>Your Smart Learning Companion</h1>
    <p>SmartPal helps students and lecturers manage their learning and teaching activities seamlessly, all in one place.</p>
    <a href="{{ route('register') }}" class="btn btn-primary-custom">Get Started</a>
</div>

<div class="features-section">
    <div class="container">
        <h2>Key Features</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="feature-card">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                        <polyline points="14 2 14 8 20 8"></polyline>
                        <line x1="16" y1="13" x2="8" y2="13"></line>
                        <line x1="16" y1="17" x2="8" y2="17"></line>
                        <polyline points="10 9 9 9"></polyline>
                    </svg>
                    <h3>Assignment Management</h3>
                    <p>Track assignments, deadlines, and grades with an intuitive interface.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                        <polyline points="3.27 6.83 12 12.01 20.73 6.83"></polyline>
                        <line x1="12" y1="22.08" x2="12" y2="12"></line>
                    </svg>
                    <h3>Real-time Communication</h3>
                    <p>Communicate with classmates and lecturers instantly through integrated chat.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="4" y1="21" x2="4" y2="14"></line>
                        <line x1="4" y1="10" x2="4" y2="3"></line>
                        <line x1="12" y1="21" x2="12" y2="12"></line>
                        <line x1="12" y1="8" x2="12" y2="3"></line>
                        <line x1="20" y1="21" x2="20" y2="16"></line>
                        <line x1="20" y1="12" x2="20" y2="3"></line>
                        <line x1="1" y1="14" x2="7" y2="14"></line>
                        <line x1="9" y1="8" x2="15" y2="8"></line>
                        <line x1="17" y1="16" x2="23" y2="16"></line>
                    </svg>
                    <h3>Centralized Resources</h3>
                    <p>Access course materials, announcements, and files easily in one place.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="testimonials-section">
    <div class="container">
        <h2 class="mb-4">What Our Users Say</h2>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="testimonial-card">
                                <p>"SmartPal makes my life so much easier. I can now manage all my assignments and discussions in a single app. Highly recommended!"</p>
                                <h5>— Mahasiswa, University of Indonesia</h5>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="testimonial-card">
                                <p>"As a lecturer, SmartPal has streamlined my teaching process. Class management and student communication are now a breeze."</p>
                                <h5>— Dosen, Gadjah Mada University</h5>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="footer">
    © 2025 Developed with a smile by SmartPal group.
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>