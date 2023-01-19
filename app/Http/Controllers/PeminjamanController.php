<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        return view(
            'pages.peminjaman.index',
            [
                'peminjaman' => Peminjaman::query()
                    ->dariTgl(request('dari'))
                    ->sampaiTgl(request('sampai'))
                    ->search(request('search'))
                    ->orderBy('no_peminjaman', 'asc')->paginate(5)
            ]
        );
    }

    public function create()
    {
        return view('pages.peminjaman.create');
    }

    public function store()
    {
        $attributes = array_merge(
            $this->validatePeminjaman(),
            [
                'nim_petugas_pinjam' => auth()->id()
            ]
        );

        Peminjaman::query()->create($attributes);

        return redirect('peminjaman')->with('success', 'Berhasil menyimpan data');
    }

    public function edit(Peminjaman $peminjaman)
    {
        return view('pages.peminjaman.edit', ['peminjaman' => $peminjaman]);
    }

    public function update(Peminjaman $peminjaman)
    {
        $attributes = array_merge(
            $this->validatePengunjung($peminjaman),
            [
                'nim_petugas_kembali' => auth()->id()
            ]
        );

        $peminjaman->update($attributes);

        return redirect('peminjaman')->with('success', 'Berhasil mengubah data');
    }

    public function destroy(Peminjaman $peminjaman)
    {
        $peminjaman->delete();

        return redirect('peminjaman')->with('success', 'Berhasil menghapus data');
    }

    protected function validatePeminjaman(?Peminjaman $peminjaman = null): array
    {
        $peminjaman ??= new Peminjaman();

        return request()->validate(
            [
                'no_buku' => ['required', 'numeric'],
                'id_pengunjung' => ['required'],
                'tgl_pinjam' => ['required'],
                'status' => ['required'],
            ],
            [
                'nim.required' => 'Nim tidak boleh kosong',
                'nim.numeric' => 'Nim harus berupa angka',
                'tgl_kunjungan.required' => 'Tanggal kunjungan tidak boleh kosong',
            ]
        );
    }
}
