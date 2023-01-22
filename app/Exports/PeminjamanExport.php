<?php

namespace App\Exports;

use App\Models\Peminjaman;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;

class PeminjamanExport implements FromQuery
{
    public function query()
    {
        return Peminjaman::query()->with('buku', 'petugas')
            ->dariTgl(request('dari'))
            ->sampaiTgl(request('sampai'))
            ->status(request('status'))
            ->search(request('search'))
            ->oldest('no_peminjaman');
    }
}
