<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
            <img src="../assets/img/logo.png" alt="" />
            <span class="d-none d-lg-block">Perpustakaan IF</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>
    <!-- End Logo -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            <li class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                    data-bs-toggle="dropdown">
                    <span class="d-none d-md-block dropdown-toggle ps-2">{{ auth()->user()->nama }}</span> 
                </a>
                <!-- End Profile Image Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>{{ auth()->user()->nama }}</h6>
                        <span>{{ auth()->user()->role }}</span>
                    </li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li>
                        <form action="logout" method="post">
                            @csrf
                            <button class="dropdown-item d-flex align-items-center" type="submit">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </button>
                        </form>
                    </li>
                </ul>
                <!-- End Profile Dropdown Items -->
            </li>
            <!-- End Profile Nav -->
        </ul>
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