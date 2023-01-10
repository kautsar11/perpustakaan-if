<x-layouts.base pageTitle="Petugas">
    <main class="container my-auto">
        <div class="w-50 mx-auto">
          <div class="card recent-sales overflow-auto">
            <div class="card-body p-5">
              <form action="" method="POST">
                @csrf
                <div class="d-flex justify-content-between">
                  <div class="mb-3">
                    <x-form.input name="nim" type="text"/>
                </div>
                <div class="mb-3">
                      <x-form.input name="nama" type="text"/>
                    </div>
                </div>
                <div class="mb-3">
                    <x-form.input name="password" type="text"/>
                </div>
                <div class="d-flex justify-content-between">
                    <x-button-link class="btn-danger" href="/">Back</x-button-link>
                    <x-form.submit-button class="btn-success">Submit</x-form.submit-button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </main>
</x-layouts.base>