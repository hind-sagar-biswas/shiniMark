<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Register bookmark
    public function create()
    {
        return view('users.create', [
            'pageTitle' => 'Register as a new User'
        ]);
    }

    // Store new user
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'username' => ['required', 'regex:/^(?!.*\.\.)(?!.*\.$)[^\W][\w.]{0,29}$/', Rule::unique('users', 'username')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6']
        ]);

        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);

        auth()->login($user);

        return redirect('/')->with('message', 'User <strong>' . $request->name . '</strong> registered successfully!');
    }

    // Show Login Form
    public function login()
    {
        return view('users.login', ['pageTitle' => 'Login']);
    }

    // Logout
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect('/')->with('message', 'Logged out!');
    }

    // Authenticate login
    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'username' => ['required', 'regex:/^(?!.*\.\.)(?!.*\.$)[^\W][\w.]{0,29}$/'],
            'password' => ['required', 'min:6']
        ]);

        if (auth()->attempt($formFields, $request->get('remember'))) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'Login Successful!');
        }

        return back()->withErrors(['username' => 'Invalid username or password.'])->onlyInput('username');
    }
}
