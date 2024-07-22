<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{
    // Register a new user
    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $defaultRole = Role::where('name', 'new employee')->first();

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $defaultRole->id,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('verification.notice');
    }

    // Login an existing user
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if (!$user->hasVerifiedEmail()) {
                Auth::logout();
                return redirect()->route('verification.notice')->withErrors(['email' => 'You need to verify your email address.']);
            }

            return redirect()->route('dashboard');
        }

        return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
    }

    // Logout the user (revoke the token)
    public function logout(Request $request)
    {
        Auth::logout();

        return redirect()->route('login');
    }

    // Send password reset link
    public function sendPasswordResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? response()->json(['status' => __($status)])
            : response()->json(['email' => __($status)], 422);
    }

    // Reset the password
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->save();

                $user->tokens()->delete();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? response()->json(['status' => __($status)])
            : response()->json(['email' => [__($status)]], 422);
    }

    // Resend verification email
    public function resendVerificationEmail(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return response()->json(['message' => 'Email already verified'], 200);
        }

        $request->user()->sendEmailVerificationNotification();

        return response()->json(['message' => 'Verification email resent'], 200);
    }

    // Verify email
    public function verifyEmail($id, Request $request)
    {
        $user = User::findOrFail($id);

        if ($user->hasVerifiedEmail()) {
            return response()->json(['message' => 'Email already verified'], 200);
        }

        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }

        return response()->json(['message' => 'Email successfully verified'], 200);
    }
}

