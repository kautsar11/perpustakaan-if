@php
    $title = 'Petugas';
@endphp

<x-layouts.base :pageTitle="$title">
    @include('components.template.header')

    <main id="main" class="main">
        <section class="section">
            <x-card :title="$title" tambah_data="{{ route('petugas.tambah') }}">

                {{-- search --}}
                <x-slot name="search">
                    <x-search action="#" placeholder="Cari petugas..." />
                </x-slot>

                {{-- table --}}
                <x-slot name="table">
                    <x-table.table :headers="['No', 'Nim', 'Nama', '']">
                        <tr>
                            <td scope="row"><a href="#">#2457</a></td>
                            <td>Brandon Jacob</td>
                            <td>
                                <span class="badge bg-success">Approved</span>
                            </td>
                            <td>
                                <x-button-link class="btn-success" href="#">Edit</x-button-link>
                                <x-button-link class="btn-danger" href="#">Delete</x-button-link>
                            </td>
                        </tr>
                    </x-table.table>
                </x-slot>
            </x-card>
        </section>
    </main>
    <!-- End #main -->

    @include('components.template.footer')l
</x-layouts.base>
