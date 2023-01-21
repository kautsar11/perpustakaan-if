@props(['title', 'tambah_data', 'excelRoute'])

<div class="w-100">
    <div class="card recent-sales overflow-auto">
        <div class="card-body">
            <div class="card-title d-flex justify-content-between">
                <h5>
                    {{ $title }}
                    <span>|
                        <x-button-link class="btn-primary" :href="$tambah_data">Tambah Data</x-button-link>
                    </span>
                </h5>

                {{-- fiter search --}}
                {{ $filterSearch ?? null }}

                <div class="d-flex justify-content-between gap-3">
                    @if (!(request()->is('/') || request()->is('buku')))
                        <!-- cetak excel-->
                        <a href="{{route($excelRoute).'?'. http_build_query(request()->except('page')) }}"
                            class="btn btn-primary btn-sm h-50">
                            <i class="bi bi-printer-fill"></i>
                            Cetak
                        </a>
                    @endif

                    <!-- search -->
                    {{ $search }}
                </div>
            </div>

            <!-- Table -->
            {{ $table }}
        </div>
    </div>
</div>
