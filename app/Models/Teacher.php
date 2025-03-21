<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $table = 'teachers'; // Nama tabel yang digunakan

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'gender',
        'status',
        'photo',
        'detail'
    ];
}
