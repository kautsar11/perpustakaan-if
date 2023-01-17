@php
    $title = 'Buku';
@endphp

<x-layouts.base :pageTitle="$title">
    @include('components.template.header')

    <main id="main" class="main">
        <section class="section">
            <x-card :title="$title" tambah_data="{{ route('buku.tambah') }}">

                {{-- search --}}
                <x-slot name="search">
                    <x-search action="buku" placeholder="Cari buku..." />
                </x-slot>

                {{-- table --}}
                <x-slot name="table">
                    @if ($buku->count())
                        <x-table.table :headers="['No', 'No Buku', 'Judul', 'Penulis', 'Jenis', '']">
                            @foreach ($buku as $b)
                                <tr>
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td>{{ $b->no_buku }}</td>
                                    <td>{{ $b->judul }}</td>
                                    <td>{{ $b->penulis }}</td>
                                    <td>{{ $b->jenis }}</td>
                                    <td class="d-flex gap-3">
                                        <x-button-link class="btn-success" href="{{ route('buku.edit', $b->no_buku) }}">
                                            Edit</x-button-link>

                                        <form action="{{ route('buku.hapus', $b->no_buku) }}" method="post">
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
                    {{ $buku->links() }}
                </x-slot>
            </x-card>
        </section>
    </main>
    <!-- End #main -->

    @include('components.template.footer')l
</x-layouts.base>
