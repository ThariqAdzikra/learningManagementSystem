<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    use HasFactory;

    protected $table = 'classrooms';

    protected $fillable = [
        'name',
        'code',
        'teacher',
        'description',
        'color'
    ];

    public function assignments()
    {
        return $this->hasMany(Assignment::class, 'classroom_id');
    }

    public function getActiveAssignments()
    {
        return $this->assignments()
            ->where('due_date', '>=', now())
            ->orderBy('due_date', 'asc')
            ->get();
    }
}