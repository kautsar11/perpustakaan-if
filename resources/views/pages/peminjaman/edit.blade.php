<x-layouts.base pageTitle="Pengunjung">
    <main class="container my-auto">
        <div class="w-50 mx-auto">
            <div class="card recent-sales overflow-auto">
                <h1 class="text-center">Ubah Peminjaman</h1>
                <div class="card-body p-5">
                    <form action="{{ route('peminjaman.edit.simpan',$peminjaman->no_peminjaman) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                            <x-form.input name="nim_peminjam" type="text" :value="old('nim_peminjam', $peminjaman->nim_peminjam)" />
                        </div>
                        <div class="mb-3">
                            <x-form.input name="nama_peminjam" type="text" :value="old('nama_peminjam',$peminjaman->nama_peminjam)" />
                        </div>
                        <div class="mb-3">
                            <x-form.label name="Judul Buku" />

                            <select name="no_buku" class='form-select'>
                                <option selected>Pilih!</option>

                                @foreach ($buku as $b)
                                    <option value="{{ $b->no_buku }}" {{ $b->no_buku === $peminjaman->no_buku ? 'selected' : '' }}>
                                        {{ $b->no_buku }}-{{ $b->judul }}
                                    </option>
                                @endforeach
                            </select>

                            <x-form.error name="no_buku" />
                        </div>
                        <div class="mb-3">
                            <x-form.input name="tgl_pinjam" type="date" :value="old('tgl_pinjam',$peminjaman->tgl_pinjam)" />
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
