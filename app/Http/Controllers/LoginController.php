<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

use function PHPUnit\Framework\returnSelf;

class LoginController extends Controller
{
    public function index(Request $request)
    {


        return view('auth.login');
    }

    public function store(Request $request)
    {

        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember_me)) {
            return redirect()->to(route('home'));
        }

        throw ValidationException::withMessages([
            'email' => 'Your credentials does not match with our records.'
        ]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->to(route('home'));
    }
}
