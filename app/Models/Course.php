<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Course extends Model
{
    use HasFactory;

    /**
     * PERBAIKAN: Menambahkan 'description' dan 'dosen_id' ke fillable
     * agar dapat diisi saat membuat kelas baru dari controller.
     */
    protected $fillable = [
        'name',
        'code',
        'schedule',
        'description', // Ditambahkan
        'dosen_id'
    ];

    /**
     * Method boot untuk meng-generate kode unik secara otomatis
     * saat data kelas baru dibuat.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($course) {
            if (empty($course->code)) {
                // Menggunakan panjang 8 karakter agar konsisten
                $course->code = static::generateUniqueCode(8);
            }
        });
    }

    /**
     * Fungsi untuk men-generate kode unik.
     * @param int $length Panjang kode yang diinginkan.
     * @return string Kode unik yang dihasilkan.
     */
    public static function generateUniqueCode(int $length = 8): string
    {
        do {
            $code = strtoupper(Str::random($length));
        } while (static::where('code', $code)->exists());

        return $code;
    }

    /**
     * Relasi ke model User (Dosen).
     * Sebuah kelas dimiliki oleh satu User (Dosen).
     */
    public function dosen(): BelongsTo
    {
        return $this->belongsTo(User::class, 'dosen_id');
    }

    /**
     * Relasi ke model User (Mahasiswa) melalui pivot table 'course_user'.
     */
    public function students(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'course_user', 'course_id', 'user_id');
    }

    /**
     * Relasi ke model Assignment (Tugas).
     */
    public function assignments(): HasMany
    {
        return $this->hasMany(Assignment::class);
    }

    /**
     * Relasi ke model Material (Materi).
     */
    public function materials(): HasMany
    {
        return $this->hasMany(Material::class);
    }

    /**
     * Relasi ke model Exam (Ujian).
     */
    public function exams(): HasMany
    {
        return $this->hasMany(Exam::class);
    }
}
