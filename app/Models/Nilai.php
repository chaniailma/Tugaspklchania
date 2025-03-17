<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $table = 'table_nilai'; // Sesuaikan dengan nama tabel di database
    protected $fillable = ['student_id', 'teacher_id', 'mapel_id', 'score'];

    // 🔹 Relasi ke Student
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    // 🔹 Relasi ke Teacher
    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    // 🔹 Relasi ke Mapel
    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'mapel_id');
    }
}
