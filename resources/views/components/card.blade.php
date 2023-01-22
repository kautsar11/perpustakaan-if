@props(['title', 'tambah_data', 'excelRoute'])

<div class="w-100">
    <div class="card recent-sales overflow-auto">
        <div class="card-body">
            {{ $searchTop ?? null }}
            <div class="card-title d-flex justify-content-between">
                <h5>
                    {{ $title }}
                    <span>|
                        <x-button-link class="btn-primary" :href="$tambah_data">Tambah Data</x-button-link>
                    </span>
                </h5>

                {{-- filter search --}}
                {{ $filterSearch ?? null }}

                {{-- filter status --}}
                {{ $filterStatus ?? null }}

                <div class="d-flex justify-content-between gap-3">
                    @if (!(request()->is('/') || request()->is('buku')))
                        <!-- cetak excel-->
                        <a href="{{route($excelRoute).'?'. http_build_query(request()->except('page')) }}"
                            class="btn btn-primary btn-sm h-50">
                            Cetak Laporan
                        </a>
                    @endif

                    <!-- search -->
                    {{ $searchAlign ?? null }}
                </div>
            </div>

            <!-- Table -->
            {{ $table }}
        </div>
    </div>
</div>
