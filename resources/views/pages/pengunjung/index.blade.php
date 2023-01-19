@php
    $title = 'Pengunjung';
@endphp

<x-layouts.base :pageTitle="$title">
    @include('components.template.header')

    <main id="main" class="main">
        <section class="section">
            <x-card :title="$title" tambah_data="{{ route('pengunjung.tambah') }}">

                {{-- filter search --}}
                <x-slot name="filterSearch">
                    <form action="pengunjung" method="get">
                        @if (request('search'))
                            <input type="hidden" name="search" value="{{ request('search') }}">
                        @endif

                        @if (request('sampai'))
                            <input type="hidden" name="sampai" value="{{ request('sampai') }}">
                        @endif

                        <x-form.input name='dari' type='date' :value="request('dari')" onchange="this.form.submit()" />
                    </form>
                    <form action="pengunjung" method="get">
                        @if (request('search'))
                            <input type="hidden" name="search" value="{{ request('search') }}">
                        @endif

                        @if (request('dari'))
                            <input type="hidden" name="dari" value="{{ request('dari') }}">
                        @endif

                        <x-form.input name='sampai' type='date' :value="request('sampai')" onchange="this.form.submit()" />
                    </form>
                </x-slot>

                {{-- search --}}
                <x-slot name="search">
                    <x-search action="pengunjung" placeholder="Cari pengunjung..." />
                </x-slot>

                {{-- table --}}
                <x-slot name="table">
                    @if ($pengunjung->count())
                        <x-table.table :headers="[
                            'No',
                            'Nomor Pengunjung',
                            'Nim',
                            'Nama',
                            'Kelas',
                            'Angkatan',
                            'No Telp',
                            'Tanggal Kunjungan',
                            '',
                        ]">
                            @foreach ($pengunjung as $p)
                                <tr>
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td>{{ $p->id }}</td>
                                    <td>{{ $p->nim }}</td>
                                    <td>{{ $p->nama }}</td>
                                    <td>{{ $p->kelas }}</td>
                                    <td>{{ $p->angkatan }}</td>
                                    <td>{{ $p->nomor_telepon }}</td>
                                    <td>{{ date('d-m-Y', strtotime($p->tgl_kunjungan)) }}</td>
                                    <td class="d-flex gap-3">
                                        <x-button-link class="btn-success"
                                            href="{{ route('pengunjung.edit', $p->id) }}">
                                            Edit</x-button-link>

                                        <form action="{{ route('pengunjung.hapus', $p->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <x-form.submit-button class="btn-danger btn-sm">
                                                Hapus
                                            </x-form.submit-button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </x-table.table>
                    @else
                        <p class="text-center">Tidak ada data</p>
                    @endif
                    {{ $pengunjung->appends(request()->query())->links() }}
                </x-slot>
            </x-card>
        </section>
    </main>
    <!-- End #main -->

    @include('components.template.footer')l
</x-layouts.base>
