<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <a href="/" class="logo d-flex align-items-center">
            <span class="d-none d-lg-block">Perpustakaan IF</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>
    <!-- End Logo -->

    <nav class="header-nav ms-auto">
        <div class="d-flex gap-3 me-4">
            <span class="d-flex align-items-center">Hi!, {{ auth()->user()->nama }}</span>
            <form action="logout" method="post">
                @csrf
                <x-form.submit-button class="btn-primary">Logout</x-form.submit-button>
            </form>
        </div>
    </nav>
    <!-- End Icons Navigation -->
</header>
<!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <x-sidebar-link class="{{ request()->is('/') ? 'text-primary' : 'text-secondary'}}" name="petugas" icon="bi-person" link="/"/>
            <x-sidebar-link class="{{ request()->is('buku') ? 'text-primary' : 'text-secondary'}}" name="buku" icon="bi-book" link="buku"/>
            <x-sidebar-link class="{{ request()->is('pengunjung') ? 'text-primary' : 'text-secondary'}}" name="pengunjung" icon="bi-people" link="pengunjung"/>
            <x-sidebar-link class="{{ request()->is('peminjaman') ? 'text-primary' : 'text-secondary'}}" name="peminjaman" icon="bi-archive" link="peminjaman"/>
        </li>
        <!-- End Dashboard Nav -->
    </ul>
</aside>
<!-- End Sidebar-->