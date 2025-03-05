<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentsController extends Controller
{
    public function index() {
        $students = DB::table('students')->get(); // Ambil semua data dari tabel students
        return view('student.index', compact('students')); // Kirim data ke view
    }
}
