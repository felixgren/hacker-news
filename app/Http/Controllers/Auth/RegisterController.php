<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct() // Construct method is called on each created object
    {
        $this->middleware(['guest']); // Redirect to home if not guest
    }

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
            'username' => 'required|max:20|unique:users',
            'email' => 'required|email|max:255|unique:users',
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

        // Auth returns user object when signed in, null otherwise.
        // Attempt takes an array of key & value pairs as argument.
        // Attempt array is used to find user in DB. User is retrieved by matching email, then compares PW in DB with one passed to method.
        // Attempt hashes passed PW for you, if hash match one in DB the authenticated session is initialized.
        // Only returns specified key & value pair from array. Easier than to define pairs manually like in User::Create.
        Auth::attempt($request->only('email', 'password'));

        $request->session()->regenerate();

        return redirect()->route('dashboard');
    }
}
