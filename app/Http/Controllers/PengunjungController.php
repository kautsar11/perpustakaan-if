<?php

namespace App\Http\Controllers;

use App\Models\Pengunjung;
use Illuminate\Http\Request;

class PengunjungController extends Controller
{
    public function index()
    {
        return view(
            'pages.pengunjung.index',
            [
                'pengunjung' => Pengunjung::query()
                    ->dariTgl(request('dari'))
                    ->sampaiTgl(request('sampai'))
                    ->search(request('search'))
                    ->orderBy('id', 'asc')->paginate(5)
            ]
        );
    }

    public function create()
    {
        return view('pages.pengunjung.create');
    }

    public function store()
    {
        $attributes = array_merge(
            $this->validatePengunjung(),
            [
                'nim_petugas' => auth()->id()
            ]
        );

        Pengunjung::query()->create($attributes);

        return redirect('pengunjung')->with('success', 'Berhasil menyimpan data');
    }

    public function edit(Pengunjung $pengunjung)
    {
        return view('pages.pengunjung.edit', ['pengunjung' => $pengunjung]);
    }

    public function update(Pengunjung $pengunjung)
    {
        $attributes = array_merge(
            $this->validatePengunjung($pengunjung),
            [
                'nim_petugas' => auth()->id()
            ]
        );

        $pengunjung->update($attributes);

        return redirect('pengunjung')->with('success', 'Berhasil mengubah data');
    }

    public function destroy(Pengunjung $pengunjung)
    {
        $pengunjung->delete();

        return redirect('pengunjung')->with('success', 'Berhasil menghapus data');
    }

    protected function validatePengunjung(?Pengunjung $pengunjung = null): array
    {
        $pengunjung ??= new Pengunjung();

        return request()->validate(
            [
                'nim' => ['required', 'numeric'],
                'kelas' => ['required'],
                'nama' => ['required'],
                'angkatan' => ['required'],
                'nomor_telepon' => ['required', 'numeric'],
                'tgl_kunjungan' => ['required'],
            ],
            [
                'nim.required' => 'Nim tidak boleh kosong',
                'nim.numeric' => 'Nim harus berupa angka',
                'kelas.required' => 'Kelas tidak boleh kosong',
                'nama.required' => 'Nama tidak boleh kosong',
                'angkatan.required' => 'Angkatan tidak boleh kosong',
                'nomor_telepon.required' => 'Nomor telepon tidak boleh kosong',
                'nomor_telepon.numeric' => 'Nomor telepon harus berupa angka',
                'tgl_kunjungan.required' => 'Tanggal kunjungan tidak boleh kosong',
            ]
        );
    }
}
