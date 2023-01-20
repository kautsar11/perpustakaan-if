<x-layouts.base pageTitle="Petugas">
    <main class="container my-auto">
        <div class="w-50 mx-auto">
          <div class="card recent-sales overflow-auto">
            <div class="card-body p-5">
              <form action="{{ route('petugas.edit.simpan',$petugas->nim) }}" method="POST">
                @csrf
                @method('PATCH')
                
                <div class="d-flex justify-content-between">
                  <div class="mb-3">
                    <x-form.input name="nim" type="text" :value="old('nim',$petugas->nim)"/>
                </div>
                <div class="mb-3">
                      <x-form.input name="nama" type="text" :value="old('nama',$petugas->nama)"/>
                    </div>
                </div>
                <div class="mb-3">
                    <x-form.input name="password" type="text"/>
                </div>
                <div class="d-flex justify-content-between">
                    <x-button-link class="btn-danger" href="/">Back</x-button-link>
                    <x-form.submit-button class="btn-success show_confirm_save">Submit</x-form.submit-button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </main>
</x-layouts.base>