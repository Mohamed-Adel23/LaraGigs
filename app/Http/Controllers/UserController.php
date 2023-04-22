<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Show Register Form
    public function create() {
        return view('users.register');
    }

    // Create New User
    public function store(Request $request) {
        $fieldsValidate = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6']
        ]);

        // Hash The Password
        $fieldsValidate['password'] = bcrypt($fieldsValidate['password']);

        // Create The User
        $user = User::create($fieldsValidate);

        // Login
        auth()->login($user);

        // Redirect
        return redirect('/')->with('message', 'Congratulations! Your accout has been created');
    }

    // Log User Out
    public function logout(Request $request) {
        // LogOut
        auth()->logout();
        // Invalidate the Session
        $request->session()->invalidate();
        // Regenerate The Session Token
        $request->session()->regenerateToken();
        // Redirect
        return redirect('/')->with('message', 'You have been logged out!!');
    }

    // Show Log User In
    public function login() {
        return view('users.login');
    }

    // Auth User
    public function authenticate(Request $request) {
        $fieldsValidate = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        // Try To find the user
        if(auth()->attempt($fieldsValidate)) {
            $request->session()->regenerate();
            return redirect('/')->with('message', 'Welcome Back');
        }
        // If Not Found Display errors
        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }
}