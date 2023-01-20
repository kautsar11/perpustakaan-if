<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PetugasController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pages.petugas.index', ['petugas' => Petugas::query()->search(request('search'))->latest('nama')->paginate(5)]);
    }

    public function create()
    {
        return view('pages.petugas.create');
    }

    public function store()
    {
        $attributes = array_merge($this->validatePetugas(), [
            'role' => 'petugas'
        ]);

        Petugas::query()->create($attributes);

        return redirect('/')->with('success', 'Data berhasil disimpan');
    }

    public function edit(Petugas $petugas)
    {
        return view('pages.petugas.edit', ['petugas' => $petugas]);
    }

    public function update(Petugas $petugas)
    {
        $attributes = $this->validatePetugas($petugas);

        $petugas->update($attributes);

        return redirect('/')->with('success', 'Data berhasil diedit');
    }

    public function destroy(Petugas $petugas)
    {
        $petugas->delete();

        return redirect('/')->with('success', 'Data terhapus');
    }

    protected function validatePetugas(?Petugas $petugas = null): array
    {
        $petugas ??= new Petugas();

        return request()->validate(
            [
                'nim' => ['required', 'numeric', Rule::unique('petugas', 'nim')->ignore($petugas)],
                'nama' => ['required'],
                'password' => ['required']
            ],
            [
                'nim.required' => 'Nim tidak boleh kosong',
                'nim.numeric' => 'Nim harus berupa angka',
                'nim.unique' => 'Nim sudah terdaftar',
                'nama.required' => 'Nama tidak boleh kosong',
                'password.required' => 'Password tidak boleh kosong',
            ]
        );
    }
}
