<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // Same thing as including in route closure directly but using controller methods provide better structure, maintainability and extensibility.
    // Seperation of logic & MVC, but it would be possible to skip controllers entirely.
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:2|max:26',
            'username' => 'required|max:20',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed',
        ];

        $customMessages = [
            'name.required' => 'Enter your :attribute',
            'username.required' => 'Enter a :attribute',
            'email.required' => 'Enter your :attribute',
            'password.required' => 'Enter a :attribute',
            'confirmed' => 'The passwords do not match.',
        ];

        $this->validate($request, $rules, $customMessages);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash facade 
        ]);

        return redirect()->route('dashboard');
    }
}
