<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Utilisateur;
use App\Models\Admin;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/evenements');
        }

        return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->back();
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // public function register(Request $request)
    // {
    //     $data = $request->validate([
    //         'name' => 'required|string',
    //         'email' => 'required|email|unique:utilisateurs',
    //         'password' => 'required|string|min:8',
    //         'role' => 'required|string|in:utilisateur,admin',
    //     ]);

    //     // Create new utilisateur
    //     Utilisateur::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => bcrypt($data['password']),
    //         'role' => $data['role'],
    //     ]);

    //     return redirect('/accueil')->with('success', 'Utilisateur registered successfully.');
    // }
}
