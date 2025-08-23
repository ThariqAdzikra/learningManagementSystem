@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
    <!-- Header Section with Back Button -->
    <div class="d-flex align-items-center mb-4 p-3 bg-dark text-white rounded-3">
        <a href="{{ route('dosen.dashboard') }}" class="btn btn-link text-white me-3 p-0" style="font-size: 1.2rem;">
            <i class="fas fa-arrow-left"></i>
        </a>
        <div>
            <h2 class="mb-0 fw-bold">{{ $course->name }}</h2>
            <p class="mb-0 text-white-75" style="font-size: 0.9rem;">{{ $course->code }} • {{ $course->schedule }}</p>
        </div>
    </div>

    <!-- Course Statistics Header - Sesuai Figma -->
    <div class="card border-0 mb-4 overflow-hidden" style="background: linear-gradient(135deg, #475569 0%, #334155 50%, #1e293b 100%); border-radius: 20px;">
        <div class="card-body p-4">
            <div class="row text-white text-center">
                <div class="col-md-3 mb-3 mb-md-0">
                    <div class="d-flex flex-column align-items-center">
                        <i class="fas fa-users mb-2" style="font-size: 2.5rem; color: #fbbf24; opacity: 0.9;"></i>
                        <h3 class="mb-1 fw-bold" style="font-size: 2rem;">32</h3>
                        <p class="mb-0 text-white-75 small">Mahasiswa</p>
                    </div>
                </div>
                <div class="col-md-3 mb-3 mb-md-0">
                    <div class="d-flex flex-column align-items-center">
                        <i class="fas fa-calendar mb-2" style="font-size: 2.5rem; color: #fbbf24; opacity: 0.9;"></i>
                        <h3 class="mb-1 fw-bold" style="font-size: 2rem;">8/16</h3>
                        <p class="mb-0 text-white-75 small">Pertemuan</p>
                    </div>
                </div>
                <div class="col-md-3 mb-3 mb-md-0">
                    <div class="d-flex flex-column align-items-center">
                        <i class="fas fa-clock mb-2" style="font-size: 2.5rem; color: #fbbf24; opacity: 0.9;"></i>
                        <h3 class="mb-1 fw-bold" style="font-size: 1.5rem;">Lab Komputer 1</h3>
                        <p class="mb-0 text-white-75 small">Ruangan</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="d-flex flex-column align-items-center">
                        <i class="fas fa-graduation-cap mb-2" style="font-size: 2.5rem; color: #fbbf24; opacity: 0.9;"></i>
                        <h3 class="mb-1 fw-bold" style="font-size: 1.3rem;">Ganjil 2024/2025</h3>
                        <p class="mb-0 text-white-75 small">Semester</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation Pills - Sesuai Figma -->
    <div class="mb-4">
        <ul class="nav nav-pills nav-fill gap-2" id="courseTab" role="tablist" style="background-color: #f1f5f9; padding: 8px; border-radius: 25px;">
            <li class="nav-item flex-fill" role="presentation">
                <button class="nav-link active w-100 fw-semibold" id="mahasiswa-tab" data-bs-toggle="pill" data-bs-target="#mahasiswa" type="button" role="tab">
                    <i class="fas fa-users me-2"></i>Mahasiswa
                </button>
            </li>
            <li class="nav-item flex-fill" role="presentation">
                <button class="nav-link w-100 fw-semibold" id="materi-tab" data-bs-toggle="pill" data-bs-target="#materi" type="button" role="tab">
                    <i class="fas fa-book me-2"></i>Materi
                </button>
            </li>
            <li class="nav-item flex-fill" role="presentation">
                <button class="nav-link w-100 fw-semibold" id="tugas-tab" data-bs-toggle="pill" data-bs-target="#tugas" type="button" role="tab">
                    <i class="fas fa-tasks me-2"></i>Tugas
                </button>
            </li>
            <li class="nav-item flex-fill" role="presentation">
                <button class="nav-link w-100 fw-semibold" id="nilai-tab" data-bs-toggle="pill" data-bs-target="#nilai" type="button" role="tab">
                    <i class="fas fa-chart-line me-2"></i>Nilai
                </button>
            </li>
        </ul>
    </div>

    <!-- Tab Content -->
    <div class="tab-content" id="courseTabContent">
        <!-- Tab Mahasiswa - Sesuai Figma -->
        <div class="tab-pane fade show active" id="mahasiswa" role="tabpanel">
            <div class="card border-0 shadow-sm" style="border-radius: 16px;">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="fw-bold mb-0" style="color: #1e293b;">Daftar Mahasiswa</h5>
                        <button class="btn btn-primary px-4 py-2" ... data-bs-toggle="modal" data-bs-target="#tambahMahasiswaModal">
    <i class="fas fa-plus me-2"></i>Tambah Mahasiswa
</button>
                    </div>
                    
                    <div class="row g-3">
                        @foreach ($students as $student)
                        <div class="col-12">
                            <div class="card border-0 shadow-sm mb-2" style="border-radius: 12px; background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);">
                                <div class="card-body p-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <div class="rounded-circle bg-dark text-white d-flex align-items-center justify-content-center me-3 shadow-sm" 
                                                 style="width: 48px; height: 48px; font-size: 1.2rem; font-weight: bold;">
                                                {{ substr($student['name'], 0, 1) }}
                                            </div>
                                            <div>
                                                <h6 class="mb-1 fw-bold" style="color: #1e293b;">{{ $student['name'] }}</h6>
                                                <small class="text-muted">NIM: {{ $student['nim'] }}</small>
                                            </div>
                                        </div>
                                        <div class="card-body p-3">
    <div class="d-flex justify-content-between align-items-center">
        <form action="{{ route('mahasiswa.hapus', ['course' => $course->id, 'student' => $student->id]) }}" method="POST" class="form-hapus">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm px-3 py-2" style="border-radius: 20px;">
                <i class="fas fa-trash me-1"></i>Hapus
            </button>
        </form>
        </div>
</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Tab Materi - Sesuai Figma -->
        <div class="tab-pane fade" id="materi" role="tabpanel">
            <div class="card border-0 shadow-sm" style="border-radius: 16px;">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="fw-bold mb-0" style="color: #1e293b;">Materi Pembelajaran</h5>
                        <button class="btn btn-primary px-4 py-2" ... data-bs-toggle="modal" data-bs-target="#uploadMateriModal">
    <i class="fas fa-upload me-2"></i>Upload Materi
</button>
                    </div>
                    
                    <div class="row g-3">
                        @foreach ($materials as $material)
                        <div class="col-12">
                            <div class="card border-0 shadow-sm mb-2" style="border-radius: 12px; background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);">
                                <div class="card-body p-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <div class="rounded-circle bg-dark text-white d-flex align-items-center justify-content-center me-3 shadow-sm" 
                                                 style="width: 48px; height: 48px;">
                                                @if($material['type'] === 'Video')
                                                    <i class="fas fa-play" style="font-size: 1.1rem;"></i>
                                                @elseif($material['type'] === 'PDF')
                                                    <i class="fas fa-file-pdf" style="font-size: 1.1rem;"></i>
                                                @else
                                                    <i class="fas fa-file" style="font-size: 1.1rem;"></i>
                                                @endif
                                            </div>
                                            <div>
                                                <h6 class="mb-1 fw-bold" style="color: #1e293b;">{{ $material['title'] }}</h6>
                                                <small class="text-muted">{{ $material['type'] }} • {{ $material['date'] }}</small>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <span class="me-3 text-muted small">28 Download</span>
                                            <div class="d-flex align-items-center">
    <span class="me-3 text-muted small"><a href="{{ asset('storage/' . $material->file_path) }}" target="_blank">Lihat File</a></span>
    
    <div class="btn-group">
        <button class="btn btn-warning btn-sm edit-materi-btn" 
                data-material-id="{{ $material->id }}" 
                data-material-title="{{ $material->title }}" 
                data-bs-toggle="modal" 
                data-bs-target="#editMateriModal" 
                style="border-radius: 8px 0 0 8px;">
            <i class="fas fa-edit"></i>
        </button>
        <form action="{{ route('materi.hapus', $material) }}" method="POST" class="form-hapus">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0 8px 8px 0;"><i class="fas fa-trash"></i></button>
        </form>
    </div>
    </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Tab Tugas - Sesuai Figma -->
        <div class="tab-pane fade" id="tugas" role="tabpanel">
            <div class="card border-0 shadow-sm" style="border-radius: 16px;">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="fw-bold mb-0" style="color: #1e293b;">Tugas & Ujian</h5>
                        <button class="btn btn-primary px-4 py-2" ... data-bs-toggle="modal" data-bs-target="#buatTugasModal">
    <i class="fas fa-plus me-2"></i>Buat Tugas
</button>
                    </div>
                    
                    <div class="row g-3">
                        <!-- Sample Tugas Data -->
                        <div class="col-12">
                            <div class="card border-0 shadow-sm mb-2" style="border-radius: 12px; background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);">
                                <div class="card-body p-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <div class="rounded-circle bg-dark text-white d-flex align-items-center justify-content-center me-3 shadow-sm" 
                                                 style="width: 48px; height: 48px;">
                                                <i class="fas fa-clipboard" style="font-size: 1.1rem;"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-1 fw-bold" style="color: #1e293b;">Tugas Individu 1</h6>
                                                <small class="text-muted">Deadline: 2025-08-26</small>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <span class="me-3 text-muted small">28/32 Terkumpul</span>
                                            <button class="btn btn-primary btn-sm px-3 py-2" style="border-radius: 20px;">
                                                Aktif
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12">
                            <div class="card border-0 shadow-sm mb-2" style="border-radius: 12px; background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);">
                                <div class="card-body p-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <div class="rounded-circle bg-dark text-white d-flex align-items-center justify-content-center me-3 shadow-sm" 
                                                 style="width: 48px; height: 48px;">
                                                <i class="fas fa-file-alt" style="font-size: 1.1rem;"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-1 fw-bold" style="color: #1e293b;">Ujian Tengah Semester</h6>
                                                <small class="text-muted">Deadline: 2025-09-18</small>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <span class="me-3 text-muted small">28/32 Terkumpul</span>
                                            <button class="btn btn-success btn-sm px-3 py-2" style="border-radius: 20px;">
                                                Selesai
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tab Nilai - Sesuai Figma -->
        <div class="tab-pane fade" id="nilai" role="tabpanel">
            <div class="card border-0 shadow-sm" style="border-radius: 16px;">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-4" style="color: #1e293b;">Rekap Nilai</h5>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead style="background: linear-gradient(135deg, #334155 0%, #1e293b 100%);">
                                <tr class="text-white">
                                    <th class="py-3 px-4 fw-semibold" style="border: none; border-radius: 12px 0 0 12px;">Mahasiswa</th>
                                    <th class="py-3 px-4 fw-semibold text-center" style="border: none;">Tugas 1</th>
                                    <th class="py-3 px-4 fw-semibold text-center" style="border: none;">Tugas 2</th>
                                    <th class="py-3 px-4 fw-semibold text-center" style="border: none;">Tugas 3</th>
                                    <th class="py-3 px-4 fw-semibold text-center" style="border: none;">Quiz</th>
                                    <th class="py-3 px-4 fw-semibold text-center" style="border: none;">UTS</th>
                                    <th class="py-3 px-4 fw-semibold text-center" style="border: none;">Tugas 4</th>
                                    <th class="py-3 px-4 fw-semibold text-center" style="border: none; border-radius: 0 12px 12px 0;">Rata-rata</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $index => $student)
                                    @php
                                        $nilai = $grades[$index] ?? ['tugas1' => 80, 'uts' => 80];
                                        $rataRata = 80; // Sesuai figma semua nilai 80
                                    @endphp
                                    <tr style="border: none;">
                                        <td class="py-3 px-4" style="border: none;">
                                            <div>
                                                <h6 class="mb-1 fw-bold" style="color: #1e293b; font-size: 0.9rem;">{{ $student['name'] }}</h6>
                                                <small class="text-muted">{{ $student['nim'] }}</small>
                                            </div>
                                        </td>
                                        <td class="py-3 px-4 text-center fw-semibold" style="border: none; color: #475569;">80</td>
                                        <td class="py-3 px-4 text-center fw-semibold" style="border: none; color: #475569;">80</td>
                                        <td class="py-3 px-4 text-center fw-semibold" style="border: none; color: #475569;">80</td>
                                        <td class="py-3 px-4 text-center fw-semibold" style="border: none; color: #475569;">80</td>
                                        <td class="py-3 px-4 text-center fw-semibold" style="border: none; color: #475569;">80</td>
                                        <td class="py-3 px-4 text-center fw-semibold" style="border: none; color: #475569;">80</td>
                                        <td class="py-3 px-4 text-center">
                                            <span class="badge bg-success px-3 py-2 fw-semibold" style="border-radius: 12px; font-size: 0.85rem;">80</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Custom Styles -->
<style>
    .text-white-75 {
        color: rgba(255, 255, 255, 0.75) !important;
    }
    
    .nav-pills .nav-link {
        border-radius: 20px;
        background-color: transparent;
        color: #6b7280;
        border: none;
        padding: 12px 20px;
        transition: all 0.3s ease;
    }
    
    .nav-pills .nav-link.active {
        background: linear-gradient(135deg, #334155 0%, #1e293b 100%);
        color: white;
        box-shadow: 0 4px 15px rgba(51, 65, 85, 0.3);
    }
    
    .nav-pills .nav-link:hover:not(.active) {
        background-color: #e5e7eb;
        color: #374151;
    }
    
    .card {
        transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
    }
    
    .card:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1) !important;
    }
    
    .btn {
        transition: all 0.2s ease-in-out;
        font-weight: 600;
    }
    
    .btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }
    
    .table tbody tr {
        border-bottom: 1px solid #f1f5f9;
    }
    
    .table tbody tr:hover {
        background-color: #f8fafc;
    }
    
    .badge {
        font-weight: 600;
        letter-spacing: 0.025em;
    }
    
    @media (max-width: 768px) {
        .container-fluid {
            padding-left: 20px;
            padding-right: 20px;
        }
        
        .nav-pills .nav-link {
            padding: 8px 12px;
            font-size: 0.85rem;
        }
        
        .card-body {
            padding: 20px !important;
        }
        
        .table-responsive {
            font-size: 0.85rem;
        }
    }
    
    /* Animation untuk tabs */
    .tab-pane {
        animation: fadeInUp 0.5s ease-out;
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
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add smooth tab switching
    const tabLinks = document.querySelectorAll('[data-bs-toggle="pill"]');
    tabLinks.forEach(link => {
        link.addEventListener('click', function() {
            // Add loading state
            const targetPane = document.querySelector(this.dataset.bsTarget);
            if (targetPane) {
                targetPane.style.opacity = '0.7';
                setTimeout(() => {
                    targetPane.style.opacity = '1';
                }, 150);
            }
        });
    });
    
    // Add confirmation for delete buttons
    const deleteButtons = document.querySelectorAll('.btn-danger');
    deleteButtons.forEach(button => {
        if (button.textContent.includes('Hapus')) {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                    // Add your delete logic here
                    console.log('Delete confirmed');
                }
            });
        }
    });
    
    // Add smooth scrolling
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
});

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Script untuk modal edit materi
    const editMateriModal = document.getElementById('editMateriModal');
    // ... (logika js lainnya) ...

    // Script untuk konfirmasi hapus
    document.querySelectorAll('.form-hapus').forEach(form => {
        // ... (logika js lainnya) ...
    });
});
</script>
@endpush
</script>
<div class="modal fade" id="tambahMahasiswaModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 16px;">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Tambah Mahasiswa Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('mahasiswa.tambah', $course) }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">NIM</label>
                        <input type="text" name="nim" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="uploadMateriModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 16px;">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Upload Materi Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('materi.upload', $course) }}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Judul Materi</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Pilih File (PDF, DOCX, PPTX, MP4, dll)</label>
                        <input type="file" name="file" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editMateriModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 16px;">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Edit Judul Materi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="editMateriForm" method="POST">
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Judul Materi</label>
                        <input type="text" name="title" id="editMateriTitle" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="buatTugasModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 16px;">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Buat Tugas Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('tugas.buat', $course) }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Judul Tugas</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi (Opsional)</label>
                        <textarea name="description" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deadline</label>
                        <input type="datetime-local" name="deadline" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endpush