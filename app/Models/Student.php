<?php

namespace App\Models;

<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Factories\HasFactory;
>>>>>>> 32004a4 (keknya ini 50 persen, dah bisa masuk ke dashboard dosen &  mahasiswa, dah bisa join dan tengok kelas)
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
<<<<<<< HEAD
    //
protected $fillable = ['name', 'nim'];

public function courses() {
    return $this->belongsToMany(Course::class);
}
=======
    use HasFactory;

    protected $fillable = ['name', 'email', 'nim']; // sesuaikan kolommu

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }
>>>>>>> 32004a4 (keknya ini 50 persen, dah bisa masuk ke dashboard dosen &  mahasiswa, dah bisa join dan tengok kelas)
}
