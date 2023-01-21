<x-layouts.base pageTitle="Pengunjung">
    <main class="container my-auto">
        <div class="w-50 mx-auto">
            <div class="card recent-sales overflow-auto">
                <h1 class="text-center">Tambah Peminjaman</h1>
                <div class="card-body p-5">
                    <form action="{{ route('peminjaman.tambah.simpan') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <x-form.input name="nim" type="text" :value="old('nim')"/>
                        </div>
                        <div class="mb-3">
                            <x-form.input name="nama" type="text" :value="old('nama')"/>
                        </div>
                        <div class="mb-3">
                            <x-form.input name="judul" type="text" :value="old('judul')"/>
                        </div>
                        <div class="mb-3">
                            <x-form.input name="tgl_kunjungan" type="date" :value="old('tgl_kunjungan')"/>
                        </div>
                        <div class="d-flex justify-content-between">
                            <x-button-link class="btn-danger" href="/peminjaman">Kembali</x-button-link>
                            <x-form.submit-button class="btn-success show_confirm_save">Simpan</x-form.submit-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</x-layouts.base>
