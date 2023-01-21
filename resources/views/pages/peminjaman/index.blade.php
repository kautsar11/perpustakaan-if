@php
    $title = 'Peminjaman';
@endphp

<x-layouts.base :pageTitle="$title">
    @include('components.template.header')

    <main id="main" class="main">
        <section class="section">
            <x-card :title="$title" tambah_data="{{ route('peminjaman.tambah') }}">

                {{-- filter search --}}
                <x-slot name="filterSearch">
                    <form action="peminjaman" method="get">
                        @if (request('search'))
                            <input type="hidden" name="search" value="{{ request('search') }}">
                        @endif

                        @if (request('sampai'))
                            <input type="hidden" name="sampai" value="{{ request('sampai') }}">
                        @endif

                        <x-form.input name='dari' type='date' :value="request('dari')" onfocus="this.value=''" onblur="this.value='{{ request('dari') }}'" onchange="this.form.submit()" />
                    </form>
                    <form action="peminjaman" method="get">
                        @if (request('search'))
                            <input type="hidden" name="search" value="{{ request('search') }}">
                        @endif

                        @if (request('dari'))
                            <input type="hidden" name="dari" value="{{ request('dari') }}">
                        @endif

                        <x-form.input name='sampai' type='date' :value="request('sampai')" onfocus="this.value=''" onblur="this.value='{{ request('sampai') }}'" onchange="this.form.submit()" />
                    </form>
                </x-slot>

                {{-- search --}}
                <x-slot name="search">
                    <x-search action="peminjaman" placeholder="Cari peminjaman..." />
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
                            'Status',
                            '',
                        ]">
                            @foreach ($peminjaman as $p)
                                <tr>
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td>{{ $p->no_peminjaman }}</td>
                                    <td>{{ $p->pengunjung->nim }}</td>
                                    <td>{{ $p->pengunjung->nama }}</td>
                                    <td>{{ $p->buku->judul }}</td>
                                    <td>{{ date('d-m-Y', strtotime($p->tgl_pinjam)) }}</td>
                                    <td>{{ $p->nim_petugas_pinjam }}</td>
                                    <td>{{ date('d-m-Y', strtotime($p->tgl_kembali)) }}</td>
                                    <td>{{ $p->nim_petugas_kembali }}</td>
                                    <td>{{ $p->status }}</td>
                                    <td>
                                        <div class="d-flex gap-3">
                                            <x-button-link class="btn-success"
                                                href="{{ route('peminjaman.edit', $p->no_peminjaman) }}">
                                                Edit</x-button-link>
    
                                            <form action="{{ route('peminjaman.hapus', $p->no_peminjaman) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <x-form.submit-button class="btn-danger btn-sm show_confirm_delete">
                                                    Hapus
                                                </x-form.submit-button>
                                            </form>
                                        </div>
                                        <x-button-link class="btn-success"
                                                {{-- href="{{ route('pengembalian.edit', $p->no_peminjaman) }}" --}}
                                                >
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
