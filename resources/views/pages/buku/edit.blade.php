<x-layouts.base pageTitle="Buku">
    <main class="container my-auto">
        <div class="w-50 mx-auto">
            <div class="card recent-sales overflow-auto">
                <div class="card-body p-5">
                    <form action="{{ route('buku.edit.simpan',$buku->no_buku) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                            <x-form.input name="judul" type="text" :value="old('judul',$buku->judul)"/>
                        </div>
                        <div class="mb-3">
                              <x-form.select class="w-50" name="jenis" :nilai="['buku bacaan', 'skripsi']" :data="$buku->jenis"/>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="mb-3">
                                <x-form.input name="penulis" type="text" :value="old('penulis',$buku->penulis)"/>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <x-button-link class="btn-danger" href="/buku">Kembali</x-button-link>
                            <x-form.submit-button class="btn-success">Simpan</x-form.submit-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</x-layouts.base>
