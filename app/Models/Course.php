<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'code', 'schedule', 'room', 'semester'
    ];
    // ...
public function students() {
    return $this->belongsToMany(Student::class);
}

public function materials() {
    return $this->hasMany(Material::class);
}

public function assignments() {
    return $this->hasMany(Assignment::class);
}
}
