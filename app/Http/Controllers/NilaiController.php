<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nilai;
use App\Models\Student; 
use App\Models\Mapel;
use App\Models\Teacher; // Pastikan singular, bukan Teachers
use Yajra\DataTables\Facades\DataTables;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Nilai::with(['student', 'mapel', 'teacher'])->get(); // Perbaiki 'teachers' menjadi 'teacher'

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('nama_student', function ($nilai) {
                    return $nilai->student->name ?? '-';
                })
                ->addColumn('nama_guru', function ($nilai) {
                    return $nilai->teacher->name ?? '-'; // Perbaiki 'teachers' → 'teacher'
                })
                ->addColumn('mapel', function ($nilai) {
                    return $nilai->mapel->nama ?? '-';
                })
                ->addColumn('aksi', function ($nilai) {
                    return view('backend.nilai.aksi', compact('nilai'));
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }
  
        return view('backend.nilai.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mapel = Mapel::all();
        $students = Student::all();
        $teachers = Teacher::all(); // Perbaiki 'Teachers' menjadi 'Teacher'
        return view('backend.nilai.create', compact('mapel', 'students', 'teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'students_id' => 'required|exists:students,id',
            'mapels_id' => 'required|exists:mapels,id',
            'teachers_id' => 'required|exists:teachers,id', // Perbaiki dari 'teachers_id' menjadi 'teacher_id'
            'nilai' => 'required|numeric|min:0|max:100',
        ]);

        Nilai::create([
            'student_id' => $request->students_id,
            'mapel_id' => $request->mapels_id,
            'teacher_id' => $request->teachers_id, // Perbaiki dari 'teachers_id'
            'score' => $request->nilai,
        ]);

        return redirect()->route('nilai')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $nilai = Nilai::findOrFail($id);
        $mapel = Mapel::all();
        $students = Student::all();
        $teachers = Teacher::all();
        return view('backend.nilai.edit', compact('nilai', 'mapel', 'students', 'teachers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'student_id' => 'sometimes|required|exists:students,id',
            'mapel_id' => 'sometimes|required|exists:mapels,id',
            'teacher_id' => 'sometimes|required|exists:teachers,id', // Perbaiki dari 'teacher' menjadi 'teachers'
            'score' => 'sometimes|required|numeric|min:0|max:100',
        ]);

        $nilai = Nilai::findOrFail($id);
        $nilai->update($request->all());

        return redirect()->route('nilai')->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $nilai = Nilai::findOrFail($id);
        $nilai->delete();

        return redirect()->route('nilai')->with('success', 'Data berhasil dihapus');
    }
}
