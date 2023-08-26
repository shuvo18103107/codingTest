<?php

namespace App\Http\Controllers;

use App\Http\Requests\Frontend\SignUpRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;




class AuthController extends Controller
{
    public function signUp()
    {
        $data['pageTitle'] = 'Sign Up';
        return view('auth.sign-up', $data);
    }
    public function login()
    {

        $data['pageTitle'] = 'Sign In';
        return view('auth.login', $data);
    }
    public function signin(Request $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            showToastrMessage('success', 'Login Successful');
            $request->session()->regenerate();

            return redirect()->route('dashboard');
        } else {
            showToastrMessage('error', 'Email and Password do not match.');
            return redirect()->route('login');
        }
    }
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        Session::flush();
        unset($_SESSION);

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/');
    }
    public function storeSignUp(SignUpRequest $request): RedirectResponse
    {
        $existingUser = User::where('email', $request->email)->latest()->first();

        if ($existingUser) {
            showToastrMessage('error', 'You already have an account.');
            return redirect()->route('login');
        }

        $user = new User([
            'name' => $request->input('first_name') . ' ' . $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        $user->save();

        showToastrMessage('success', 'Your registration is successfully completed');

        return redirect()->route('login');
    }
}
