@extends('layouts.app')

@section('title', 'Kelas: ' . $class['name'])

@section('content')
<div class="container mx-auto p-6">
    <!-- Class Header -->
    <div class="bg-slate-600 text-white rounded-lg p-6 mb-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold">{{ $class['name'] }}</h1>
                <p class="text-slate-200">{{ $class['code'] }} • {{ $class['schedule'] }}</p>
                <p class="text-slate-300 text-sm">{{ $class['semester'] }} • {{ $class['room'] }}</p>
            </div>
            <div class="text-right">
                <div class="bg-orange-500 text-white px-3 py-1 rounded-full text-sm">
                    <i class="fas fa-users mr-1"></i>
                    {{ count($students) }} Mahasiswa
                </div>
            </div>
        </div>
    </div>

    <!-- Tab Navigation -->
    <div class="bg-white rounded-lg shadow-sm mb-6">
        <div class="flex border-b">
            <button id="mahasiswa-tab" class="tab-active px-6 py-3 font-medium rounded-tl-lg" onclick="showTab('mahasiswa')">
                <i class="fas fa-users mr-2"></i>Mahasiswa
            </button>
            <button id="materi-tab" class="tab-inactive px-6 py-3 font-medium" onclick="showTab('materi')">
                <i class="fas fa-book mr-2"></i>Materi
            </button>
            <button id="tugas-tab" class="tab-inactive px-6 py-3 font-medium" onclick="showTab('tugas')">
                <i class="fas fa-tasks mr-2"></i>Tugas
            </button>
            <button id="nilai-tab" class="tab-inactive px-6 py-3 font-medium rounded-tr-lg" onclick="showTab('nilai')">
                <i class="fas fa-chart-bar mr-2"></i>Nilai
            </button>
        </div>

        <!-- Mahasiswa Tab -->
        <div id="mahasiswa-content" class="p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-slate-700">Daftar Mahasiswa</h3>
                <button class="bg-slate-600 text-white px-4 py-2 rounded-lg hover:bg-slate-700">
                    <i class="fas fa-plus mr-2"></i>Tambah Mahasiswa
                </button>
            </div>
            <div class="space-y-3">
                @foreach($students as $student)
                <div class="flex items-center justify-between p-4 bg-slate-50 rounded-lg">
                    <div class="flex items-center space-x-4">
                        <img src="{{ $student['avatar'] }}" alt="{{ $student['name'] }}" class="w-10 h-10 rounded-full">
                        <div>
                            <h4 class="font-medium text-slate-800">{{ $student['name'] }}</h4>
                            <p class="text-sm text-slate-600">NIM: {{ $student['nim'] }}</p>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('class.remove-student', [$class['id'], $student['id']]) }}" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-sm"
                                onclick="return confirmDelete('mahasiswa', '{{ $student['name'] }}')">
                            <i class="fas fa-trash mr-1"></i>Hapus
                        </button>
                    </form>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Materi Tab -->
        <div id="materi-content" class="p-6 hidden">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-slate-700">Materi Pembelajaran</h3>
                <button class="bg-slate-600 text-white px-4 py-2 rounded-lg hover:bg-slate-700">
                    <i class="fas fa-plus mr-2"></i>Upload Materi
                </button>
            </div>
            <div class="space-y-3">
                @foreach($materials as $material)
                <div class="flex items-center justify-between p-4 bg-slate-50 rounded-lg">
                    <div class="flex items-center space-x-4">
                        <div class="w-10 h-10 bg-slate-600 rounded-lg flex items-center justify-center">
                            @if($material['type'] == 'pdf')
                                <i class="fas fa-file-pdf text-red-500"></i>
                            @elseif($material['type'] == 'pptx')
                                <i class="fas fa-file-powerpoint text-orange-500"></i>
                            @elseif($material['type'] == 'mp4')
                                <i class="fas fa-file-video text-blue-500"></i>
                            @else
                                <i class="fas fa-file-word text-blue-600"></i>
                            @endif
                        </div>
                        <div>
                            <h4 class="font-medium text-slate-800">{{ $material['title'] }}</h4>
                            <p class="text-sm text-slate-600">{{ $material['size'] }} • {{ $material['uploaded_at'] }}</p>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('class.delete-material', [$class['id'], $material['id']]) }}" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-sm"
                                onclick="return confirmDelete('materi', '{{ $material['title'] }}')">
                            <i class="fas fa-trash mr-1"></i>Hapus
                        </button>
                    </form>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Tugas Tab -->
        <div id="tugas-content" class="p-6 hidden">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-slate-700">Daftar Tugas</h3>
                <button class="bg-slate-600 text-white px-4 py-2 rounded-lg hover:bg-slate-700">
                    <i class="fas fa-plus mr-2"></i>Buat Tugas
                </button>
            </div>
            <div class="space-y-4">
                @foreach($assignments as $assignment)
                <div class="p-4 bg-slate-50 rounded-lg">
                    <div class="flex justify-between items-start mb-2">
                        <h4 class="font-medium text-slate-800">{{ $assignment['title'] }}</h4>
                        <span class="text-sm text-slate-600">
                            <i class="fas fa-calendar mr-1"></i>{{ $assignment['deadline'] }}
                        </span>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <span class="text-sm text-slate-600">
                                <i class="fas fa-check-circle text-green-500 mr-1"></i>
                                {{ $assignment['submitted'] }}/{{ $assignment['total'] }} Terkumpul
                            </span>
                            <div class="w-32 bg-gray-200 rounded-full h-2">
                                <div class="bg-green-500 h-2 rounded-full" style="width: {{ ($assignment['submitted']/$assignment['total'])*100 }}%"></div>
                            </div>
                        </div>
                        <div class="flex space-x-2">
                            <button class="bg-slate-600 text-white px-3 py-1 rounded text-sm hover:bg-slate-700">
                                <i class="fas fa-eye mr-1"></i>Lihat
                            </button>
                            <button class="bg-blue-500 text-white px-3 py-1 rounded text-sm hover:bg-blue-600">
                                <i class="fas fa-edit mr-1"></i>Edit
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Nilai Tab -->
        <div id="nilai-content" class="p-6 hidden">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-slate-700">Nilai Mahasiswa</h3>
                <button class="bg-slate-600 text-white px-4 py-2 rounded-lg hover:bg-slate-700">
                    <i class="fas fa-download mr-2"></i>Export Excel
                </button>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full bg-white rounded-lg overflow-hidden">
                    <thead class="bg-slate-600 text-white">
                        <tr>
                            <th class="px-4 py-3 text-left">Nama Mahasiswa</th>
                            <th class="px-4 py-3 text-center">NIM</th>
                            <th class="px-4 py-3 text-center">Tugas 1</th>
                            <th class="px-4 py-3 text-center">Tugas 2</th>
                            <th class="px-4 py-3 text-center">UTS</th>
                            <th class="px-4 py-3 text-center">UAS</th>
                            <th class="px-4 py-3 text-center">Nilai Akhir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($grades as $grade)
                        <tr class="border-b hover:bg-slate-50">
                            <td class="px-4 py-3 font-medium">{{ $grade['student'] }}</td>
                            <td class="px-4 py-3 text-center">{{ $grade['nim'] }}</td>
                            <td class="px-4 py-3 text-center">
                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-sm">{{ $grade['tugas1'] }}</span>
                            </td>
                            <td class="px-4 py-3 text-center">
                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-sm">{{ $grade['tugas2'] }}</span>
                            </td>
                            <td class="px-4 py-3 text-center">
                                <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded text-sm">{{ $grade['uts'] }}</span>
                            </td>
                            <td class="px-4 py-3 text-center">
                                <span class="bg-gray-100 text-gray-600 px-2 py-1 rounded text-sm">{{ $grade['uas'] }}</span>
                            </td>
                            <td class="px-4 py-3 text-center">
                                <span class="bg-gray-100 text-gray-600 px-2 py-1 rounded text-sm">{{ $grade['final'] }}</span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
