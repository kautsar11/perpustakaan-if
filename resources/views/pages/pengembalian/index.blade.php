<x-layouts.base pageTitle="Pengunjung">
    <main class="container my-auto">
        <div class="w-50 mx-auto">
            <div class="card recent-sales overflow-auto">
                <h1 class="text-center">Ubah Peminjaman</h1>
                <div class="card-body p-5">
                    <form action="{{ route('pengembalian.simpan',$peminjaman->no_peminjaman) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                            <x-form.input name="tgl_kembali" type="date" :value="old('tgl_kembali',$peminjaman->tgl_kembali)" />
                        </div>
                        <div class="mb-3">
                            <x-form.select name="status" :nilai="['dipinjam','dikembalikan', 'hilang']" :data="$peminjaman->status"/>
                        </div>
                        <div class="mb-3">
                            <x-form.label name="keterangan" />

                            <textarea name="keterangan" class="form-control"  rows="5">
                                {{ old('keterangan',$peminjaman->keterangan) }}
                            </textarea>

                            <x-form.error name="keterangan" />

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
