<style>
    .user-panel {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        padding-top: 15px
    }

    .info {
        margin-top: 5px;
    }

    .main-sidebar .nav-link {
        color: white !important;
        /* Mengubah warna tulisan menjadi putih */
    }

    .main-sidebar .nav-link.active {
        background-color: #ffffff !important;
        /* Ganti #your-desired-color dengan warna yang Anda inginkan */
        color: black !important;
        /* Mengubah warna teks menjadi putih */
    }

    .main-sidebar .nav-link.subactive {
        background-color: #203E4E !important;
        /* Ganti #your-desired-color dengan warna yang Anda inginkan */
        color: white !important;
        /* Mengubah warna teks menjadi putih */
    }
</style>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4" style="background-color: #315E77;">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <!-- Ganti gambar dengan ikon user dari Font Awesome dengan ukuran dan warna yang diinginkan -->
                <i class="fas fa-user-circle fa-5x" style="color: rgb(251, 242, 242);"></i>
            </div>
            <div class="info">
                <a href="#" class="d-block" style="color: white;">Hi, {{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-4">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview ">
                    <a href="{{ url('/admin') }}"
                        class="nav-link {{ request()->is('admin')  ? 'active' : '' }}">
                        <i class="fas fa-home nav-icon"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/dataguru') }}"
                        class="nav-link {{ request()->is('dataguru') || request()->is('tambahdataguru') || request()->is('detailguru/*') || request()->is('editguru/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-solid fa-user-tie"></i>
                        <p>
                            Data Guru
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/datasiswa') }}"
                        class="nav-link {{ request()->is('datasiswa') || request()->is('detailsiswa/*') || request()->is('editsiswa/*') || request()->is('tambahdatasiswa') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-solid fa-user"></i>
                        <p>
                            Data Siswa
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/datauser') }}"
                        class="nav-link {{ request()->is('datauser') || request()->is('tambahakun-ortu') || request()->is('tambahakun-guru')  || request()->is('editakun*') || request()->is('detailakun-ortu') || request()->is('detailakun-guru') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-solid fa-user-plus"></i>
                        <p>
                            Data User
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
