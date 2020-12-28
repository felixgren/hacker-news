<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        dd(auth()->user()); // If user object is displayed we are logged in

        return view('dashboard');
    }
}
