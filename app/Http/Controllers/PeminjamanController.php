<?php

namespace App\Http\Controllers;

use App\Exports\PeminjamanExport;
use App\Models\Buku;
use App\Models\Peminjaman;
use Maatwebsite\Excel\Facades\Excel;

class PeminjamanController extends Controller
{
    public function index()
    {
        return view(
            'pages.peminjaman.index',
            [
                'peminjaman' => Peminjaman::query()->with('buku', 'petugas')
                    ->dariTgl(request('dari'))
                    ->sampaiTgl(request('sampai'))
                    ->status(request('status'))
                    ->search(request('search'))->paginate(5)
            ]
        );
    }

    public function create()
    {
        return view('pages.peminjaman.create', [
            'buku' => Buku::query()->get(),
        ]);
    }

    public function store()
    {
        $attributes = array_merge(
            $this->validatePeminjaman(),
            [
                'status' => 'dipinjam',
                'nim_petugas_pinjam' => auth()->id()
            ]
        );

        Peminjaman::query()->create($attributes);

        return redirect('peminjaman')->with('success', 'Data berhasil disimpan');
    }

    public function edit(Peminjaman $peminjaman)
    {
        return view('pages.peminjaman.edit', [
            'peminjaman' => $peminjaman, 'buku' => Buku::query()->get(),
        ]);
    }

    public function update(Peminjaman $peminjaman)
    {
        $attributes = $this->validatePeminjaman($peminjaman);

        $peminjaman->update($attributes);

        return redirect('peminjaman')->with('success', 'Data berhasil diedit');
    }

    public function destroy(Peminjaman $peminjaman)
    {
        $peminjaman->delete();

        return redirect('peminjaman')->with('success', 'Data terhapus');
    }

    public function pengembalian(Peminjaman $peminjaman)
    {
        return view('pages.pengembalian.index', [
            'peminjaman' => $peminjaman
        ]);
    }

    public function updatePengembalian(Peminjaman $peminjaman)
    {
        $attributes = request()->validate([
            'tgl_kembali' => ['required'],
            'status' => ['required'],
            'keterangan' => []
        ]);

        $attributes['nama_petugas_kembali'] = auth()->user()->nama;

        $peminjaman->update($attributes);

        return redirect('peminjaman')->with('success', 'Data berhasil disimpan');
    }

    protected function validatePeminjaman(?Peminjaman $peminjaman = null): array
    {
        $peminjaman ??= new Peminjaman();

        return request()->validate(
            [
                'no_buku' => ['required'],
                'nim_peminjam' => ['required', 'min:0', 'max:8'],
                'nama_peminjam' => ['required'],
                'tgl_pinjam' => ['required'],
            ],
            [
                'no_buku.exist' => 'Buku tidak terdaftar',
                'nim_peminjam.required' => 'Nim tidak boleh kosong',
                'nim_peminjam.required' => 'Nim tidak boleh lebih dari 8 angka',
                'nama_peminjam.required' => 'Nama tidak boleh kosong',
                'tgl_pinjam.required' => 'Tanggal kunjungan tidak boleh kosong',
            ]
        );
    }

    // untuk export excel
    public function export()
    {
        return Excel::download(new PeminjamanExport, 'peminjaman.xlsx');
    }
}
