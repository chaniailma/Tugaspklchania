<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use Yajra\DataTables\Facades\DataTables;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class PendaftaranController extends Controller
{
   // public function __construct()
   // {

        // Middleware hanya diterapkan untuk halaman yang butuh login
        //$this->middleware('auth')->except(['create', 'store']);
   // }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Pendaftaran::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('aksi', function ($pendaftaran) {
                    return view('backend.pendaftaran.action', compact('pendaftaran'));
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }
        return view('backend.pendaftaran.index');
    }

        public function create()
        {
            return view('auth.create'); // Mengakses create.blade.php di dalam folder auth
        }

    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nisn' => 'required|string|unique:pendaftaran,nisn',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'asal_sekolah' => 'required|string|max:255',
            'nomor_hp' => 'required|string|max:15',
            'nama_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'alamat_email' => 'required|email|unique:pendaftaran,alamat_email',
            'jurusan_pertama' => 'required|string|max:255',
            'status' => 'required|in:pending,diterima,ditolak',
        ]);

        // Simpan data
        Pendaftaran::create($validatedData);

        return redirect()->route('pendaftaran.create')->with('success', 'Pendaftaran berhasil dikirim.');
    }

    public function edit($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        return view('backend.pendaftaran.edit', compact('pendaftaran'));
    }

    public function update(Request $request, $id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);

        // Validasi data dengan mengabaikan email & NISN yang sudah ada
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nisn' => 'required|string|unique:pendaftaran,nisn,' . $id,
            'address' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'gender' => 'required|in:Laki-laki,Perempuan',
            'asal_sekolah' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'nama_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'alamat_email' => 'required|email|unique:pendaftaran,email,' . $id,
        ]);

        // Update data
        $pendaftaran->update($validatedData);

        return redirect()->route('pendaftaran')->with('success', 'Data pendaftaran berhasil diperbarui.');
    }

   public function show($id)
{
    $pendaftaran = Pendaftaran::find($id);

    if (!$pendaftaran) {
        return redirect()->route('pendaftaran.index')->with('error', 'Data tidak ditemukan');
    }

    return view('backend.pendaftaran.show', compact('pendaftaran'));
}

public function updateStatus(Request $request, $id)
{
    $pendaftaran = Pendaftaran::findOrFail($id);
    $pendaftaran->status = $request->status;
    $pendaftaran->save();

    return redirect()->back()->with('success', 'Status berhasil diperbarui');
}


    public function delete($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran->delete();

        return redirect()->route('pendaftaran')->with('success', 'Data pendaftaran berhasil dihapus.');
    }

    public function search(Request $request)
    {
        $request->validate([
            'nisn' => 'required|numeric'
        ]);
    
        $pendaftaran = Pendaftaran::where('nisn', $request->nisn)->first();
    
        if (!$pendaftaran) {
            return redirect()->back()->with('error', 'NISN tidak ditemukan.');
        }
    
        return view('backend.pendaftaran.status', compact('pendaftaran'));
    }
    public function downloadPdf($id)
{
    $pendaftaran = Pendaftaran::findOrFail($id);
    
    $pdf = Pdf::loadView('backend.pendaftaran.export_pdf', compact('pendaftaran'));
    
    return $pdf->download('formulir_pendaftaran.pdf');
}
    
    public function exportPDF()
    {
        $pendaftaran = Pendaftaran::all();
        $pdf = Pdf::loadView('backend.pendaftaran.pdf', compact('pendaftaran'));

        return $pdf->download('data_pendaftaran.pdf');
}
}