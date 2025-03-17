<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Student extends Model

{
    use HasFactory;

    protected $table = 'students'; // Sesuai dengan nama tabel di database

    protected $fillable = [
        'name',
        'email',
        'phone',
        'class',
        'address',
        'gender',
        'status',
        'photo',
    ];
};


