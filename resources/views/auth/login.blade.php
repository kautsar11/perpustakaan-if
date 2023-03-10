<x-layouts.base pageTitle="Login">
    <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="d-flex flex-column justify-content-center py-4">
                            <a href="/" class="logo d-flex flex-column align-items-center w-auto">
                                <span class="d-none d-lg-block fs-5">Selamat datang di Perpus IF UNIKOM</span>
                            </a>
                            <img class="mx-auto" src="{{ asset('images/logo-HMIF.png') }}" width="50%" alt="Perpustakaan IF UNIKOM"/>
                        </div>
                        <!-- End Logo -->

                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Login</h5>
                                </div>

                                <form class="row g-3" action="login" method="POST" novalidate >
                                    @csrf
                                    <x-form.wrap>
                                        <x-form.input type="text" name="nim" />
                                    </x-form.wrap>

                                    <x-form.wrap>
                                        <x-form.input type="password" name="password" />
                                    </x-form.wrap>

                                    <x-form.wrap>
                                        <x-form.submit-button class="btn-primary w-100">Login</x-form.submit-button>
                                    </x-form.wrap>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-layouts.base>
