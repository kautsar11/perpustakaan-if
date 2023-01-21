<?php

namespace App\Exports;

use App\Models\Pengunjung;
use Maatwebsite\Excel\Concerns\FromQuery;

class PengunjungExport implements FromQuery
{

    public function query()
    {
        return Pengunjung::query()
            ->dariTgl(request('dari'))
            ->sampaiTgl(request('sampai'))
            ->search(request('search'))
            ->oldest('id');
    }
}
