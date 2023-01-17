<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        return view('pages.buku.index', ['buku' => Buku::query()->search(request('search'))->orderBy('no_buku', 'asc')->paginate(5)]);
    }

    public function create()
    {
        return view('pages.buku.create');
    }

    public function store()
    {
        $attributes = $this->validateBuku();

        Buku::query()->create($attributes);

        return redirect('buku')->with('success', 'Berhasil menyimpan data');
    }

    public function edit(Buku $buku)
    {
        return view('pages.buku.edit', ['buku' => $buku]);
    }

    public function update(Buku $buku)
    {
        $attributes = $this->validateBuku($buku);

        $buku->update($attributes);

        return redirect('buku')->with('success', 'Berhasil mengubah data');
    }

    public function destroy(Buku $buku)
    {
        $buku->delete();

        return redirect('buku')->with('success', 'Berhasil menghapus data');
    }

    protected function validateBuku(?Buku $buku = null): array
    {
        $buku ??= new Buku();

        return request()->validate(
            [
                'judul' => ['required'],
                'jenis' => ['required'],
                'penulis' => ['required']
            ],
            [
                'judul.required' => 'Judul tidak boleh kosong',
                'jenis.required' => 'Jenis tidak boleh kosong',
                'penulis.required' => 'Penulis tidak boleh kosong',
            ]
        );
    }
}
