<?php

namespace App\Http\Controllers;

use App\Exports\PengunjungExport;
use App\Models\Pengunjung;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PengunjungController extends Controller
{
    public function index()
    {
        return view(
            'pages.pengunjung.index',
            [
                'pengunjung' => Pengunjung::query()->with('petugas')
                    ->dariTgl(request('dari'))
                    ->sampaiTgl(request('sampai'))
                    ->search(request('search'))
                    ->oldest('id')->paginate(5)
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

        return redirect('pengunjung')->with('success', 'Data berhasil disimpan');
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

        return redirect('pengunjung')->with('success', 'Data berhasil diedit');
    }

    public function destroy(Pengunjung $pengunjung)
    {
        $pengunjung->delete();

        return redirect('pengunjung')->with('success', 'Data terhapus');
    }

    protected function validatePengunjung(?Pengunjung $pengunjung = null): array
    {
        $pengunjung ??= new Pengunjung();

        return request()->validate(
            [
                'nim' => ['required', 'regex:/[0-9]{9}/', 'min:0', 'max:8'],
                'kelas' => ['required', 'min:0', 'max:6'],
                'nama' => ['required'],
                'angkatan' => ['required', 'min:0', 'max:4'],
                'nomor_telepon' => ['required', 'regex:/[0-9]{9}/', 'min:0', 'max:20'],
                'tgl_kunjungan' => ['required'],
            ],
            [
                'nim.required' => 'Nim tidak boleh kosong',
                'nim.max' => 'Nim tidak boleh lebih dari 8 angka',
                'kelas.required' => 'Kelas tidak boleh kosong',
                'kelas.max' => 'Kelas tidak boleh lebih dari 6 karakter',
                'nama.required' => 'Nama tidak boleh kosong',
                'angkatan.required' => 'Angkatan tidak boleh kosong',
                'angkatan.max' => 'Angkatan tidak boleh lebih dari 4 karakter',
                'nomor_telepon.required' => 'Nomor telepon tidak boleh kosong',
                'nomor_telepon.max' => 'Nomor telepon tidak boleh lebih dari 20 angka',
                'tgl_kunjungan.required' => 'Tanggal kunjungan tidak boleh kosong',
            ]
        );
    }

    // untuk export excel
    public function export()
    {
        return Excel::download(new PengunjungExport, 'pengunjung.xlsx');
    }
}
