<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Students; // Import Model Student

class StudentsController extends Controller
{
    public function index()
    {
        $students = Students::all(); // Menggunakan Eloquent
        return view('backend.students.index', compact('students'));
    }

    public function create()
    {
        return view('backend.students.create');
    }

    public function store(Request $request)
    {
        // Validasi form
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students',
            'phone' => 'required',
            'class' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'status' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $photoPath = null;

        if ($request->hasFile('photo')) {
            $photoName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('backend/photos'), $photoName);
            $photoPath = 'photos/' . $photoName;
        }

        // Insert ke database menggunakan Eloquent
        Students::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'class' => $request->class,
            'address' => $request->address,
            'gender' => $request->gender,
            'status' => $request->status,
            'photo' => $photoPath,
        ]);

        return redirect()->route('students')->with('success', 'Data siswa berhasil ditambahkan');
    }

    public function edit($id)
    {
        $student = Students::findOrFail($id);
        return view('backend.students.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students,email,' . $id,
            'phone' => 'required',
            'class' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'status' => 'required',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $student = Students::findOrFail($id);
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
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'class' => $request->class,
            'address' => $request->address,
            'gender' => $request->gender,
            'status' => $request->status,
            'photo' => $photoPath,
        ]);

        return redirect()->route('students')->with('success', 'Data siswa berhasil diperbarui');
    }

    public function delete($id)
    {
        $student = Students::findOrFail($id);

        // Hapus foto jika ada dan bukan default
        if ($student->photo && file_exists(public_path($student->photo))) {
            unlink(public_path($student->photo));
        }

        // Hapus data siswa
        $student->delete();

        return redirect()->route('students')->with('success', 'Data siswa berhasil dihapus');
    }
}
