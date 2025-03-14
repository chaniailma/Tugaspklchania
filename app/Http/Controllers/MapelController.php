<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mapel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;




class MapelController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('mapels')->get();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('aksi', function ($mapel) {
                    return view('backend.mapel.aksi', compact('mapel'));
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }
  

        return view('backend.mapel.index');
    }

    public function create()
    {
        return view('backend.mapel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255'
        ]);

        Mapel::create($request->all());

        return redirect()->route('mapel')->with('success', 'Mata pelajaran berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $mapel = Mapel::findOrFail($id);
        return view('backend.mapel.edit', compact('mapel'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255'
        ]);

        $mapel = Mapel::findOrFail($id);
        $mapel->update($request->all());

        return redirect()->route('mapel')->with('success', 'Mata pelajaran berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $mapel = Mapel::findOrFail($id);
        $mapel->delete();

        return redirect()->route('mapel')->with('success', 'Mata pelajaran berhasil dihapus.');
    }
}
