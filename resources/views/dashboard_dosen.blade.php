@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
    <!-- Header Section - Sesuai Figma -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 position-relative overflow-hidden" style="background: linear-gradient(135deg, #64748b 0%, #475569 50%, #334155 100%); min-height: 200px; border-radius: 20px;">
                <div class="card-body p-4 d-flex justify-content-between align-items-center position-relative z-index-1">
                    <div class="text-white">
                        <p class="mb-2 small text-white-75" style="font-size: 0.875rem; opacity: 0.8;">
                            {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
                        </p>
                        <h2 class="mb-2 fw-bold" style="font-size: 2rem; line-height: 1.2;">
                            Selamat Pagi, {{ $dosen->name }}
                        </h2>
                        <p class="mb-0 text-white-75" style="opacity: 0.9; font-size: 1rem;">
                            Semangat mengajar dan membimbing mahasiswa hari ini!
                        </p>
                    </div>
                    <div class="position-absolute end-0 top-50 translate-middle-y me-4" style="font-size: 5rem; opacity: 0.2; color: #fbbf24;">
                        <i class="fas fa-sun"></i>
                    </div>
                </div>
                <!-- Decorative elements -->
                <div class="position-absolute top-0 end-0" style="width: 100px; height: 100px; background: radial-gradient(circle, rgba(251, 191, 36, 0.3) 0%, transparent 70%); border-radius: 50%; transform: translate(30px, -30px);"></div>
            </div>
        </div>
    </div>

    <!-- Overview Section - Sesuai Figma -->
    <div class="row mb-5">
        <div class="col-12">
            <h4 class="mb-4 fw-bold text-dark" style="font-size: 1.5rem;">Overview</h4>
        </div>
        
        <div class="col-md-4 mb-3">
            <div class="card border-0 shadow-sm h-100" style="background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%); border-radius: 16px;">
                <div class="card-body text-center py-5">
                    <div class="mb-3">
                        <i class="fas fa-chalkboard-teacher" style="font-size: 2.5rem; color: #64748b; opacity: 0.7;"></i>
                    </div>
                    <h6 class="text-muted mb-2 fw-semibold" style="font-size: 0.875rem;">Kelas</h6>
                    <h2 class="mb-0 fw-bold" style="font-size: 3rem; color: #1e293b;">{{ $stats['classCount'] }}</h2>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 mb-3">
            <div class="card border-0 shadow-sm h-100" style="background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%); border-radius: 16px;">
                <div class="card-body text-center py-5">
                    <div class="mb-3">
                        <i class="fas fa-users" style="font-size: 2.5rem; color: #64748b; opacity: 0.7;"></i>
                    </div>
                    <h6 class="text-muted mb-2 fw-semibold" style="font-size: 0.875rem;">Mahasiswa</h6>
                    <h2 class="mb-0 fw-bold" style="font-size: 3rem; color: #1e293b;">{{ $stats['studentCount'] }}</h2>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 mb-3">
            <div class="card border-0 shadow-sm h-100" style="background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%); border-radius: 16px;">
                <div class="card-body text-center py-5">
                    <div class="mb-3">
                        <i class="fas fa-tasks" style="font-size: 2.5rem; color: #64748b; opacity: 0.7;"></i>
                    </div>
                    <h6 class="text-muted mb-2 fw-semibold" style="font-size: 0.875rem;">Tugas</h6>
                    <h2 class="mb-0 fw-bold" style="font-size: 3rem; color: #1e293b;">{{ $stats['assignmentCount'] }}</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- My Course Section - Sesuai Figma -->
    <div class="row">
        <div class="col-12">
            <h4 class="mb-4 fw-bold text-dark" style="font-size: 1.5rem;">My Course</h4>
        </div>
        
        @forelse ($courses as $course)
            <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                <div class="card border-0 text-white h-100 position-relative overflow-hidden" 
                     style="background: linear-gradient(135deg, #475569 0%, #334155 50%, #1e293b 100%); border-radius: 20px; min-height: 320px;">
                    
                    <!-- Card Header -->
                    <div class="card-body p-4 d-flex flex-column h-100">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <h5 class="card-title fw-bold mb-0" style="font-size: 1.1rem; line-height: 1.3;">
                                {{ $course->name }}
                            </h5>
                            <div class="dropdown">
                                <button class="btn btn-link text-white p-1" type="button" data-bs-toggle="dropdown" style="font-size: 1.2rem;">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-edit me-2"></i>Edit Kelas</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-eye me-2"></i>Detail Kelas</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-trash me-2"></i>Hapus</a></li>
                                </ul>
                            </div>
                        </div>
                        
                        <!-- Course Icon & Badge -->
                        <div class="d-flex align-items-center mb-4">
                            <div class="rounded-circle bg-white d-flex align-items-center justify-content-center me-3 shadow-sm" 
                                 style="width: 50px; height: 50px;">
                                <i class="fas fa-infinity text-dark" style="font-size: 1.5rem;"></i>
                            </div>
                            <span class="badge rounded-pill px-3 py-2" 
                                  style="background-color: rgba(148, 163, 184, 0.3); color: #cbd5e1; font-size: 0.75rem;">
                                +5
                            </span>
                        </div>
                        
                        <!-- Course Info -->
                        <div class="course-info flex-grow-1" style="font-size: 0.9rem;">
                            <div class="d-flex align-items-center mb-3">
                                <div class="rounded-circle d-flex align-items-center justify-content-center me-3" 
                                     style="width: 32px; height: 32px; background-color: rgba(255, 255, 255, 0.1);">
                                    <i class="fas fa-book" style="font-size: 0.9rem;"></i>
                                </div>
                                <span class="text-white-75">Kelas: {{ $course->code }}</span>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <div class="rounded-circle d-flex align-items-center justify-content-center me-3" 
                                     style="width: 32px; height: 32px; background-color: rgba(255, 255, 255, 0.1);">
                                    <i class="fas fa-users" style="font-size: 0.9rem;"></i>
                                </div>
                                <span class="text-white-75">32 Mahasiswa</span>
                            </div>
                            <div class="d-flex align-items-center mb-4">
                                <div class="rounded-circle d-flex align-items-center justify-content-center me-3" 
                                     style="width: 32px; height: 32px; background-color: rgba(255, 255, 255, 0.1);">
                                    <i class="fas fa-clock" style="font-size: 0.9rem;"></i>
                                </div>
                                <span class="text-white-75">{{ $course->schedule }}</span>
                            </div>
                        </div>
                        
                        <!-- Action Button -->
                        <div class="mt-auto">
                            <a href="{{ route('dosen.kelas.show', $course) }}" 
                               class="btn btn-primary w-100 fw-semibold py-3 shadow-sm"
                               style="border-radius: 12px; background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%); border: none; font-size: 0.95rem;">
                                <i class="fas fa-arrow-right me-2"></i>Buka Kelas
                            </a>
                        </div>
                    </div>
                    
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="card border-0 shadow-sm" style="border-radius: 16px; background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);">
                    <div class="card-body text-center py-5">
                        <div class="mb-4">
                            <i class="fas fa-chalkboard-teacher" style="font-size: 4rem; color: #cbd5e1;"></i>
                        </div>
                        <h5 class="text-muted mb-2">Belum Ada Kelas</h5>
                        <p class="text-muted mb-4">Anda belum memiliki kelas yang tersedia saat ini.</p>
                        <button class="btn btn-primary px-4 py-2" style="border-radius: 10px;">
                            <i class="fas fa-plus me-2"></i>Tambah Kelas Baru
                        </button>
                    </div>
                </div>
            </div>
        @endforelse
    </div>
</div>

<!-- Custom Styles -->
<style>
    .text-white-75 {
        color: rgba(255, 255, 255, 0.75) !important;
    }
    
    .card {
        transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
    }
    
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15) !important;
    }
    
    .btn {
        transition: all 0.2s ease-in-out;
    }
    
    .btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }
    
    .dropdown-menu {
        border: none;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        border-radius: 12px;
    }
    
    .dropdown-item {
        padding: 8px 16px;
        border-radius: 8px;
        margin: 2px 8px;
    }
    
    .dropdown-item:hover {
        background-color: #f8fafc;
    }
    
    .course-info .rounded-circle {
        transition: background-color 0.2s ease-in-out;
    }
    
    .course-info .d-flex:hover .rounded-circle {
        background-color: rgba(255, 255, 255, 0.2) !important;
    }
    
    @media (max-width: 768px) {
        .container-fluid {
            padding-left: 20px;
            padding-right: 20px;
        }
        
        .card-body {
            padding: 20px !important;
        }
        
        h2 {
            font-size: 1.5rem !important;
        }
        
        .course-info {
            font-size: 0.85rem !important;
        }
    }
    
    /* Animasi untuk loading state */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .card {
        animation: fadeInUp 0.6s ease-out forwards;
    }
    
    .card:nth-child(1) { animation-delay: 0.1s; }
    .card:nth-child(2) { animation-delay: 0.2s; }
    .card:nth-child(3) { animation-delay: 0.3s; }
    .card:nth-child(4) { animation-delay: 0.4s; }
</style>
@endsection

@push('scripts')
<script>
// Add smooth scrolling and interaction effects
document.addEventListener('DOMContentLoaded', function() {
    // Animate cards on scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);
    
    // Observe all cards
    document.querySelectorAll('.card').forEach(card => {
        observer.observe(card);
    });
    
    // Add click ripple effect to buttons
    document.querySelectorAll('.btn').forEach(button => {
        button.addEventListener('click', function(e) {
            const ripple = document.createElement('span');
            ripple.classList.add('ripple');
            this.appendChild(ripple);
            
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;
            
            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = x + 'px';
            ripple.style.top = y + 'px';
            
            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });
});
</script>

<style>
/* Ripple effect */
.btn {
    position: relative;
    overflow: hidden;
}

.ripple {
    position: absolute;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.3);
    animation: ripple-animation 0.6s ease-out;
    pointer-events: none;
}

@keyframes ripple-animation {
    0% {
        transform: scale(0);
        opacity: 1;
    }
    100% {
        transform: scale(1);
        opacity: 0;
    }
}
</style>
@endpush