<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SecretLoginController extends Controller
{
    /**
     * Handle secret login via image click/double-click
     */
    public function check(Request $request)
    {
        // Check for secret token in request
        $secretToken = $request->get('token', '');

        // Define your secret token from .env
        $validToken = env('ADMIN_SECRET_TOKEN');

        if (!$validToken) {
            \Log::error('ADMIN_SECRET_TOKEN not set in .env file');
            abort(500, 'Server configuration error');
        }

        if ($secretToken === $validToken) {
            // Find or create admin user using env credentials
            $adminEmail = env('ADMIN_EMAIL', 'admin@portfolio.local');
            $adminName = env('ADMIN_NAME', 'Administrator');
            $adminPassword = env('ADMIN_PASSWORD');

            if (!$adminPassword) {
                \Log::error('ADMIN_PASSWORD not set in .env file');
                abort(500, 'Server configuration error');
            }

            $admin = User::firstOrCreate(
                ['email' => $adminEmail],
                [
                    'name' => $adminName,
                    'password' => Hash::make($adminPassword),
                    'is_admin' => true,
                ]
            );

            // Ensure user is admin
            if (!$admin->is_admin) {
                $admin->update(['is_admin' => true]);
            }

            // Login the admin user
            Auth::login($admin);

            return redirect('/admin')->with('success', 'Welcome to Admin Panel!');
        }

        // If token doesn't match, return 404
        abort(404);
    }

    /**
     * Show hidden login form.
     */
    public function showLoginForm()
    {
        // Only redirect if already logged in as admin
        if (auth()->check() && auth()->user()->is_admin) {
            return redirect('/admin');
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
            
            // Check if user is admin
            if (!auth()->user()->is_admin) {
                auth()->logout();
                return back()->withErrors([
                    'email' => 'You do not have admin privileges.',
                ]);
            }
            
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
