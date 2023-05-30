@php
    $title = 'Pengunjung';
@endphp

<x-layouts.base :pageTitle="$title">
    @include('components.template.header')

    <main id="main" class="main">
        <section class="section">
            <x-card excelRoute="pengunjung.export" :title="$title" tambah_data="{{ route('pengunjung.tambah') }}">

                {{-- filter tanggal --}}
                <x-slot name="filterSearch">
                    <form action="pengunjung" method="get">
                        @if (request('search'))
                            <input type="hidden" name="search" value="{{ request('search') }}">
                        @endif

                        @if (request('sampai'))
                            <input type="hidden" name="sampai" value="{{ request('sampai') }}">
                        @endif

                        <x-form.input name='dari' type='date' :value="request('dari')" onfocus="this.value=''" onblur="this.value='{{ request('dari') }}'" onchange="this.form.submit()" />
                    </form>
                    <form action="pengunjung" method="get">
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
                <x-slot name="searchTop">
                <div class="d-flex justify-content-end">
                    <x-search class="mt-3" action="pengunjung" placeholder="Cari pengunjung..." />
                </div>
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
                            'Nama Petugas',
                            '',
                        ]">
                            @foreach ($pengunjung as $p)
                                <tr>
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $p->id }}</td>
                                    <td>{{ $p->nim }}</td>
                                    <td>{{ $p->nama }}</td>
                                    <td>{{ $p->kelas }}</td>
                                    <td>{{ $p->angkatan }}</td>
                                    <td>{{ $p->nomor_telepon }}</td>
                                    <td class="text-center">{{ date('d-m-Y', strtotime($p->tgl_kunjungan)) }}</td>
                                    <td class="text-center">{{ $p->petugas->nama }}</td>
                                    <td class="d-flex gap-3">
                                        <x-button-link class="btn-success"
                                            href="{{ route('pengunjung.edit', $p->id) }}">
                                            Edit</x-button-link>

                                        <form action="{{ route('pengunjung.hapus', $p->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <x-form.submit-button class="btn-danger btn-sm show_confirm_delete">
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
