<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class PdfController extends Controller
{
    public function exportPdf()
    {
        $nilai = DB::table('table_nilai') 
            ->join('students', 'table_nilai.student_id', '=', 'students.id') 
            ->join('teachers', 'table_nilai.teacher_id', '=', 'teachers.id') 
            ->join('mapels', 'table_nilai.mapel_id', '=', 'mapels.id') 
            ->select(
                'students.name as student_name', 
                'teachers.name as teacher_name', 
                'mapels.nama as mapel_nama', 
                'table_nilai.score' 
            )
            ->get();

        // Load view PDF
        $pdf = Pdf::loadView('backend.nilai.nilai', compact('nilai'));

        return $pdf->stream('data-nilai.pdf');
    }
}
