<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    Public function index()
    {
        $users = DB::table('users')->get();
        //dd($users);
        return view('backend.user.index', compact('users'));
    }

    public function create()
{
    return view('backend.user.create');
}
    public function store(Request $request)
    {
        //validation form
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'created_at' => now(),
            'updated_at' => now(),
        ];

        DB::table('users')->insert($data);

        return redirect()->route('user')->with('success', 'Data berhasil disimpan');


}
        public function edit($id)
        {
            $user = DB::table('users')->where('id', $id)->first();   
            return view('backend.user.edit', compact('user'));      
        }    
        public function update(Request $request, $id)
        {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email,'.$id,
                'password' => 'confirmed|min:6'
            ]);
            $data = [
                'name' => $request->name,       
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'updated_at' => now(),
            ];
            DB::table('users')->where('id', $id)->update($data);
            return redirect()->route('user')->with('success', 'Data berhasil diupdate');
        }

        public function delete($id)
        {
            DB::table('users')->where('id', $id)->delete();
            return redirect()->route('user')->with('success', 'Data berhasil dihapus');
        }   
}