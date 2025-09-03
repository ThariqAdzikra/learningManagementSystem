<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = ['course_id', 'title', 'description', 'deadline', 'type', 'is_completed', 'due_date'];
    // Tambahkan field sesuai tabel di database

    public function course()
    {
        return $this->belongsTo(ClassRoom::class);
    }

    public function getTypeIcon()
    {
        return match ($this->type) {
            'tugas' => '📝',
            'quiz' => '❓',
            'materi' => '📚',
            default => '📋',
        };
    }

    public function getStatusBadge()
    {
        if ($this->is_completed) {
            return '<span class="badge completed">Selesai</span>';
        }

        if ($this->due_date && $this->due_date->isPast()) {
            return '<span class="badge overdue">Terlambat</span>';
        }

        return '<span class="badge pending">Pending</span>';
    }
}
