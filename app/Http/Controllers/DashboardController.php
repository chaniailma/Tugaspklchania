<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    Public function index()
    {
       // $dashboard = DB::table('dashboard')->get();
        //dd($users);
        return view('backend.dashboard.index');
    }
    
}
