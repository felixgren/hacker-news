<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct() // Construct method is called on each created object
    {
        $this->middleware(['guest']); // Redirect to home if not guest
    }

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

        // Only returns specified key & value pair from array. Easier than to define pairs manually.
        // Auth returns user object when signed in, null otherwise.
        // Attempt takes an array of key & value pairs as argument.
        // Attempt array is used to find user in DB. User is retrieved by matching email, then compares PW in DB with one passed to method.
        // Attempt hashes passed PW for you, if hash match one in DB the authenticated session is initialized.
        $credentials = $request->only('email', 'password');
        $remember = $request->remember;

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }

        return back()->with('status', 'Incorrect login details :(');
    }
}
