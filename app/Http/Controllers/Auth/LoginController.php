<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() // Show form
    {
        return view('auth.login');
    }

    public function store(Request $request) // Sign user in
    {

        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];

        $customMessages = [
            'email.required' => 'Enter your :attribute',
            'password.required' => 'Enter your :attribute',
        ];

        $this->validate($request, $rules, $customMessages);

        dd('YEEE');
    }
}
