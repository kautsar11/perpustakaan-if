<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BukuController extends Controller
{
    public function index()
    {
        return view('pages.buku.index', ['buku' => Buku::query()->search(request('search'))->oldest('no_buku')->paginate(5)]);
    }

    public function create()
    {
        return view('pages.buku.create');
    }

    public function store()
    {
        $attributes = $this->validateBuku();

        Buku::query()->create($attributes);

        return redirect('buku')->with('success', 'Data berhasil disimpan');
    }

    public function edit(Buku $buku)
    {
        return view('pages.buku.edit', ['buku' => $buku]);
    }

    public function update(Buku $buku)
    {
        $attributes = $this->validateBuku($buku);

        $buku->update($attributes);

        return redirect('buku')->with('success', 'Data berhasil diedit');
    }

    public function destroy(Buku $buku)
    {
        $buku->delete();

        return redirect('buku')->with('success', 'Data terhapus');
    }

    protected function validateBuku(?Buku $buku = null): array
    {
        $buku ??= new Buku();

        return request()->validate(
            [
                'judul' => ['required'],
                'jenis' => ['required', Rule::exists('buku', 'jenis')],
                'penulis' => ['required']
            ],
            [
                'judul.required' => 'Judul tidak boleh kosong',
                'jenis.required' => 'Jenis tidak boleh kosong',
                'jenis.exists' => 'Jenis tidak ditemukan',
                'penulis.required' => 'Penulis tidak boleh kosong',
            ]
        );
    }
}
