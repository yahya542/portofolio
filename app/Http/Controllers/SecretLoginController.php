<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SecretLoginController extends Controller
{
    /**
     * Handle secret login via image click/double-click
     */
    public function check(Request $request)
    {
        // Check for secret token in request
        $secretToken = $request->get('token', '');

        // Define your secret token (change this!)
        $validToken = env('ADMIN_SECRET_TOKEN', 'my_secret_admin_token_2024');

        if ($secretToken === $validToken) {
            // Find or create admin user
            $admin = User::firstOrCreate(
                ['email' => 'admin@portfolio.local'],
                [
                    'name' => 'Administrator',
                    'password' => bcrypt('admin123'), // Change this!
                ]
            );

            // Login the admin user
            Auth::login($admin);

            return redirect('/admin')->with('success', 'Welcome to Admin Panel!');
        }

        // If token doesn't match, return 404 or redirect to home
        abort(404);
    }

    /**
     * Show hidden login form (for debugging/development)
     */
    public function showLoginForm()
    {
        // Only show if not authenticated and in development
        if (auth()->check() || app()->environment('production')) {
            return redirect('/');
        }

        return view('admin.login');
    }

    /**
     * Handle login form submission
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    /**
     * Logout
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
