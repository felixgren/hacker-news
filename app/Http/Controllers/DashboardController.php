<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct() // Construct method is called on each created object
    {
        $this->middleware(['auth']); // Redirect to login if not authenticated
    }

    public function index()
    {
        return view('dashboard');
    }
}
