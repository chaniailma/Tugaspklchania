<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Student; // Import Model Student
use App\http\Requests\StoreStudentRequest;
use DataTables;
use Illuminate\Support\Facades\DB;

class StudentsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $students = Student::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                             ->orWhere('email', 'like', "%{$search}%");
            })
            ->paginate(3);

        return view('backend.students.index', compact('students', 'search'));
    }

    public function getALLStudents()
    {
        $students = Student::all(); // Menggunakan Eloquent
        return view('backend.students.index', compact('students'));
    }

    public function create()
    {
        return view('backend.students.create');
    }

    public function store(StoreStudentRequest $request)
    {
        

        $photoPath = null;

        if ($request->hasFile('photo')) {
            $photoName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('backend/photos'), $photoName);
            $photoPath = 'photos/' . $photoName;
        }

        //Insert ke database menggunakan Eloquent
        Student::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'phone'   => $request->phone,
            'class'   => $request->class,
            'address' => $request->address,
            'gender'  => $request->gender,
            'status'  => $request->status,
            'photo'   => $photoPath,
        ]);

        return redirect()->route('students')->with('success', 'Data siswa berhasil ditambahkan');
    }

    
    public function show($id)
    {
        $teacher = DB::table('students')->where('id', $id)->first();

        if (!$teacher) {
            return redirect()->route('students')->with('error', 'Data tidak ditemukan');
        }

        return view('backend.students.show', compact('student'));
    }


    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('backend.students.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'name'   => 'required',
            'email'  => 'required|email|unique:students,email,' . $id,
            'phone'  => 'required',
            'class'  => 'required',
            'address' => 'required',
            'gender'  => 'required',
            'status'  => 'required',
            'photo'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $student = Student::findOrFail($id);
        $photoPath = $student->photo; // Gunakan foto lama jika tidak ada yang baru

        // Jika ada foto baru, hapus foto lama dan simpan yang baru
        if ($request->hasFile('photo')) {
            if ($student->photo && file_exists(public_path($student->photo))) {
                unlink(public_path($student->photo));
            }

            // Simpan foto baru
            $photoName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('backend/photos'), $photoName);
            $photoPath = 'photos/' . $photoName;
        }

        // Update data siswa
        $student->update([
            'name'    => $request->name,
            'email'   => $request->email,
            'phone'   => $request->phone,
            'class'   => $request->class,
            'address' => $request->address,
            'gender'  => $request->gender,
            'status'  => $request->status,
            'photo'   => $photoPath,
        ]);

        return redirect()->route('students')->with('success', 'Data siswa berhasil diperbarui');
    }

    public function delete($id)
    {
        $student = Student::findOrFail($id);

        // Hapus foto jika ada dan bukan default
        if ($student->photo && file_exists(public_path($student->photo))) {
            unlink(public_path($student->photo));
        }

        // Hapus data siswa
        $student->delete();

        return redirect()->route('students')->with('success', 'Data siswa berhasil dihapus');
    }
}
