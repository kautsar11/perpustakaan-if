@props(['title','tambah_data'])

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

                <div class="d-flex justify-content-between gap-3">
                    <!-- cetak -->
                    <button class="btn btn-primary btn-sm h-75">
                        <i class="bi bi-printer-fill"></i>
                        Cetak
                    </button>

                    <!-- search -->
                    {{ $search }}
                </div>
            </div>

            <!-- Table -->
            {{ $table }}
        </div>
    </div>
</div>
