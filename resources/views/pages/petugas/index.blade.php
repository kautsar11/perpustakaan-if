@php
    $title = 'Petugas';
@endphp

<x-layouts.base :pageTitle="$title">
    @include('components.template.header')

    <main id="main" class="main">
        <section class="section">
            <x-card :title="$title" tambah_data="{{ route('petugas.tambah') }}">

                {{-- search --}}
                <x-slot name="searchAlign">
                    <x-search action="/" placeholder="Cari petugas..." />
                </x-slot>

                {{-- table --}}
                <x-slot name="table">
                    @if ($petugas->count())
                        <x-table.table :headers="['No', 'Nim', 'Nama', '']">
                            @foreach ($petugas as $p)
                                <tr>
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td>{{ $p->nim }}</td>
                                    <td>{{ $p->nama }}</td>
                                    <td class="d-flex gap-3">
                                        <x-button-link class="btn-success" href="{{ route('petugas.edit', $p->nim) }}">
                                            Edit</x-button-link>

                                        @if (auth()->user()->role !== $p->role)
                                            <form action="{{ route('petugas.hapus', $p->nim) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <x-form.submit-button class="btn-danger btn-sm show_confirm_delete">
                                                    Hapus
                                                </x-form.submit-button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </x-table.table>
                    @else
                        <p class="text-center">Tidak ada data</p>
                    @endif
                    {{ $petugas->appends(request()->query())->links() }}
                </x-slot>
            </x-card>
        </section>
    </main>
    <!-- End #main -->

    @include('components.template.footer')l
</x-layouts.base>
