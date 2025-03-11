<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use Database\Seeders\TeacherSeeder;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    /**
     * Menampilkan daftar guru.
     */
    public function index()
    {
        $teachers = Teacher::latest()->paginate(10);
        return view('backend.teachers.index', compact('teachers'));
    }

    /**
     * Menampilkan form tambah guru.
     */
    public function create()
    {
        return view('backend.teachers.create');
    }

    /**
     * Menyimpan data guru baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'gender' => 'required|in:male,female',
            'status' => 'required|in:active,inactive',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'detail' => 'nullable|string',
        ]);

        if ($request->hasFile('photo')) {
            $photoName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('backend/photos'), $photoName);
            $photoPath = 'photos/' . $photoName; // Simpan path relatif ke public
        } else {
            $photoPath = null;
        }
        
        // Simpan ke database
        Teacher::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
            'status' => $request->status,
            'photo' => $photoPath, // Simpan path relatif
            'detail' => $request->detail,
        ]);
        

        return redirect()->route('teachers')->with('success', 'Data guru berhasil ditambahkan!');
    }

    public function show($id)
    {
        $teacher = DB::table('teachers')->where('id', $id)->first();

        if (!$teacher) {
            return redirect()->route('teachers')->with('error', 'Data tidak ditemukan');
        }

        return view('backend.teachers.show', compact('teacher'));
    }

    /**
     * Menampilkan form edit guru.
     */
    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('backend.teachers.edit', compact('teacher'));
    }

    /**
     * Memperbarui data guru.
     */
    public function update(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers,email,' . $id,
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'gender' => 'required|in:male,female',
            'status' => 'required|in:active,inactive',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
           
        ]);

        //Jika ada foto baru yang diunggah
        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($teacher->photo && file_exists(public_path($teacher->photo))) {
                unlink(public_path($teacher->photo));
            }
    
            // Simpan foto baru
            $photoName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('backend/photos'), $photoName);
            $teacher->photo = 'photos/' . $photoName; // Update path foto baru
        }
    
        // Update data guru
        $teacher->update($request->except('photo'));
        $teacher->save(); // Simpan perubahan jika ada foto baru

        return redirect()->route('teachers')->with('success', 'Data guru berhasil diperbarui!');
    }

    /**
     * Menghapus data guru.
     */
    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();

        return redirect()->route('teachers')->with('success', 'Data guru berhasil dihapus!');
    }
}
