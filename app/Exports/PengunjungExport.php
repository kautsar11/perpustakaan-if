<?php

namespace App\Exports;

use App\Models\Pengunjung;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PengunjungExport implements FromQuery, WithHeadings
{

    public function headings(): array
    {
        return [
            'No',
            'Nomor Pengunjung',
            'Nim',
            'Nama',
            'Kelas',
            'Angkatan',
            'No Telp',
            'Tanggal Kunjungan',
        ];
    }

    public function query()
    {
        return Pengunjung::query()
            ->dariTgl(request('dari'))
            ->sampaiTgl(request('sampai'))
            ->search(request('search'))
            ->oldest('id');
    }
}
