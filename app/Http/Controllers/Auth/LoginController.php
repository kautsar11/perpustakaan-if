<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }

    public function store()
    {
        $attributes = request()->validate(
            [
                'nim' => ['required', 'numeric'],
                'password' => ['required']
            ],
            [
                'nim.required' => 'Nim tidak boleh kosong',
                'nim.numeric' => 'Nim harus berupa angka',
                'password.required' => 'Password tidak boleh kosong',
            ]
        );

        if (!auth()->attempt($attributes)) {
            throw ValidationException::withMessages(
                ['nim' => 'Data yang anda masukkan tidak sesuai']
            );
        }

        session()->regenerate();

        return redirect('/')->with('success', 'Selamat datang');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('login');
    }
}
