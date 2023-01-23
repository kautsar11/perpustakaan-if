@php
    $title = 'Peminjaman';
@endphp
<x-layouts.base :pageTitle="$title">
    @include('components.template.header')

    <main id="main" class="main">
        <section class="section">
            <x-card excelRoute="peminjaman.export" :title="$title" tambah_data="{{ route('peminjaman.tambah') }}">

                {{-- filter tanggal --}}
                <x-slot name="filterSearch">
                    <form action="peminjaman" method="get">
                        @if (request('search'))
                            <input type="hidden" name="search" value="{{ request('search') }}">
                        @endif

                        @if (request('status'))
                            <input type="hidden" name="status" value="{{ request('status') }}">
                        @endif

                        @if (request('sampai'))
                            <input type="hidden" name="sampai" value="{{ request('sampai') }}">
                        @endif

                        <x-form.input name='dari' type='date' :value="request('dari')" onfocus="this.value=''"
                            onblur="this.value='{{ request('dari') }}'" onchange="this.form.submit()" />
                    </form>
                    <form action="peminjaman" method="get">
                        @if (request('search'))
                            <input type="hidden" name="search" value="{{ request('search') }}">
                        @endif

                        @if (request('status'))
                            <input type="hidden" name="status" value="{{ request('status') }}">
                        @endif

                        @if (request('dari'))
                            <input type="hidden" name="dari" value="{{ request('dari') }}">
                        @endif

                        <x-form.input name='sampai' type='date' :value="request('sampai')" onfocus="this.value=''"
                            onblur="this.value='{{ request('sampai') }}'" onchange="this.form.submit()" />
                    </form>
                </x-slot>

                {{-- finter status --}}
                <x-slot name="filterStatus">
                    <form action="peminjaman" method="get">
                        @if (request('search'))
                            <input type="hidden" name="search" value="{{ request('search') }}">
                        @endif

                        @if (request('dari'))
                            <input type="hidden" name="dari" value="{{ request('dari') }}">
                        @endif

                        <select name="status" class="form-select h-50" style="width: 160px" aria-label="filter status" onchange="this.form.submit()">
                                <option value="semua" {{ request('status') == 'semua' ? 'selected' : ''}}>Semua</option>
                                <option value="dipinjam" {{ request('status') == 'dipinjam' ? 'selected' : ''}}>Dipinjam</option>
                                <option value="dikembalikan" {{ request('status') == 'dikembalikan' ? 'selected' : ''}}>Dikembalikan</option>
                                <option value="hilang" {{ request('status') == 'hilang' ? 'selected' : ''}}>Hilang</option>
                        </select>
                    </form>
                </x-slot>

                {{-- search --}}
                <x-slot name="searchTop">
                    <div class="d-flex justify-content-end">
                        <x-search class="mt-3" action="peminjaman" placeholder="Cari peminjaman..." />
                    </div>
                </x-slot>

                {{-- table --}}
                <x-slot name="table">
                    @if ($peminjaman->count())
                        <x-table.table :headers="[
                            'No',
                            'No Peminjaman',
                            'Nim Peminjam',
                            'Nama Peminjam',
                            'Judul Buku',
                            'Tanggal Pinjam',
                            'Petugas Peminjam',
                            'Tanggal Kembali',
                            'Petugas Pengembalian',
                            'Keterangan'
                            'Status',
                            '',
                        ]">
                            @foreach ($peminjaman as $p)
                                <tr>
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td>{{ $p->no_peminjaman }}</td>
                                    <td>{{ $p->nim_peminjam }}</td>
                                    <td>{{ $p->nama_peminjam }}</td>
                                    <td>{{ $p->buku->judul }}</td>
                                    <td>{{ date('d-m-Y', strtotime($p->tgl_pinjam)) }}</td>
                                    <td>{{ $p->petugas->nama }}</td>
                                    <td>{{ $p->tgl_kembali ? date('d-m-Y', strtotime($p->tgl_kembali)) : '' }}</td>
                                    <td>{{ $p->nama_petugas_kembali }}</td>
                                    <td>{{ $p->status }}</td>
                                    <td>{{ $p->keterangan }}</td>
                                    <td>
                                        <div class="d-flex gap-3">
                                            <x-button-link class="btn-success"
                                                href="{{ route('peminjaman.edit', $p->no_peminjaman) }}">
                                                Edit</x-button-link>

                                            <form action="{{ route('peminjaman.hapus', $p->no_peminjaman) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <x-form.submit-button class="btn-danger btn-sm show_confirm_delete">
                                                    Hapus
                                                </x-form.submit-button>
                                            </form>
                                        </div>
                                        <x-button-link class="btn-success mt-1"
                                            href="{{ route('pengembalian', $p->no_peminjaman) }}">
                                            Pengembalian</x-button-link>
                                    </td>
                                </tr>
                            @endforeach
                        </x-table.table>
                    @else
                        <p class="text-center">Tidak ada data</p>
                    @endif
                    {{ $peminjaman->appends(request()->query())->links() }}
                </x-slot>
            </x-card>
        </section>
    </main>
    <!-- End #main -->

    @include('components.template.footer')l
</x-layouts.base>
