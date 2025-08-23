<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
protected $fillable = ['name', 'nim'];

public function courses() {
    return $this->belongsToMany(Course::class);
}
}
