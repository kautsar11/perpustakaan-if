<x-layouts.base pageTitle="Buku">
    <main class="container my-auto">
        <div class="w-50 mx-auto">
            <div class="card recent-sales overflow-auto">
                <h1 class="text-center">Tambah Buku</h1>
                <div class="card-body p-5">
                    <form action="{{ route('buku.tambah.simpan') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <x-form.input name="judul" type="text" :value="old('judul')"/>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="mb-3">
                                <x-form.select name="jenis" :nilai="['buku bacaan', 'skripsi']" />
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="mb-3">
                                <x-form.input name="penulis" type="text" :value="old('penulis')"/>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <x-button-link class="btn-danger" href="/buku">Kembali</x-button-link>
                            <x-form.submit-button class="btn-success show_confirm_save">Simpan</x-form.submit-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</x-layouts.base>
