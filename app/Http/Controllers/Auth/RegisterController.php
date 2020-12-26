<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    // Same thing as including in route closure directly but using controller methods provide better structure, maintainability and extensibility.
    // Seperation of logic & MVC, but it would be possible to skip controllers entirely.
    public function register()
    {
        return view('auth.register');
    }
}
