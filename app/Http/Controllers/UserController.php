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
    //
}
