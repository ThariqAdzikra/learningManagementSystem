<?php

namespace App\Models;

 dashboard_dosen

use Illuminate\Database\Eloquent\Factories\HasFactory;
main
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{

}

    use HasFactory;

    protected $fillable = [
        'classroom_id',
        'title',
        'description',
        'type',
        'due_date',
        'created_date',
        'score',
        'is_completed'
    ];

    protected $casts = [
        'due_date' => 'datetime',
        'created_date' => 'datetime',
        'is_completed' => 'boolean'
    ];

    public function classroom()
    {
        return $this->belongsTo(ClassRoom::class);
    }

    public function getTypeIcon()
    {
        return match ($this->type) {
            'tugas' => '📝',
            'quiz' => '❓',
            'materi' => '📚',
            default => '📋'
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
 main
