<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Mapel;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('backend.dashboard.index', [
            'users' => User::count(),
            'students' => Student::count(),
            'teachers' => Teacher::count(),
            'mapels' => Mapel::count(),
    
            // Hitung jumlah nilai berdasarkan kategori huruf
            'scoreA' => DB::table('table_nilai')->whereBetween('score', [85, 100])->count(),
            'scoreB' => DB::table('table_nilai')->whereBetween('score', [70, 84])->count(),
            'scoreC' => DB::table('table_nilai')->whereBetween('score', [55, 69])->count(),
            'scoreD' => DB::table('table_nilai')->whereBetween('score', [40, 54])->count(),
            'scoreE' => DB::table('table_nilai')->whereBetween('score', [0, 39])->count(),
        ]);
    }
    
}
