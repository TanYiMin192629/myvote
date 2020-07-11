<?php

namespace App\Http\Controllers;
use App\Election;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $elections = Election::all()->sortByDesc('end_date');
        $candidates = User::where('role', 1)->get();
        return view('index', compact('candidates', 'elections'));
    }

}
