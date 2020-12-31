<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="{{ asset('vendor/adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
        style="opacity: .8">
        <span class="brand-text font-weight-light">Pemesanan Lapangan</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('vendor/adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="/user" class="d-block active">{{ $user['namaUser'] }}</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/" class="nav-link {{ (request()->is('/')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-building"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/allUser" class="nav-link {{ (request()->is('allUser*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>User</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/venue" class="nav-link {{ (request()->is('venue*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-futbol"></i>
                        <p>Venue</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/transaksi" class="nav-link {{ (request()->is('transaksi*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Transaksi</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
