<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }

    public function store()
    {
        $credentials = request()->validate(
            [
                'nim' => ['required', 'regex:/^[0-9]{8}$/'],
                'password' => ['required']
            ],
            [
                'nim.required' => 'Nim tidak boleh kosong',
                'nim.regex' => 'Format nim tidak sesuai',
                'password.required' => 'Password tidak boleh kosong',
            ]
        );

        if (!auth()->attempt($credentials)) {
            return back()->with('warning', 'Gagal login silahkan cek kembali Nim / Nama anda');
        }

        session()->regenerate();

        if (auth()->user()?->role === 'admin') {
            return redirect('/')->with('success', 'Anda berhasil login');
        } else {
            return redirect('buku')->with('success', 'Anda berhasil login');
        }
    }

    public function destroy()
    {
        auth()->logout();

        session()->invalidate();
        session()->regenerateToken();

        return redirect('login');
    }
}
