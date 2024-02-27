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
                <img src="{{ asset('adminlte-v3') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                    alt="User Image" style="max-width: 100%; height: auto; width: 50%; height: 50%;">
            </div>
            <div class="info">
                <a href="#" class="d-block" style="color: white;">Hi, Admin</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-4">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview ">
                    <a href="{{ url('/') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                        <i class="fas fa-home nav-icon"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('profil_guru') }}"
                        class="nav-link {{ request()->is('fitur_guru/profil*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-solid fa-user-tie"></i>
                        <p>
                            Profil Guru
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/datasiswa') }}" class="nav-link {{ request()->is('datasiswa') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-signature"></i>
                        <p>
                            Absensi
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/fitur_guru/absensi_siswa/absensi') }}"
                            class="nav-link {{ request()->is('fitur_guru/absensi_siswa/absensi') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-list" style="font-size: 18px; margin-right: 5px;"></i>
                                <p style="margin-left: 5px;">Absensi Siswa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/fitur_guru/absensi_siswa/rekap_absensi') }}"
                            class="nav-link {{ request()->is('rekap_absensi') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-file" style="font-size: 18px; margin-right: 5px;"></i>
                                <p style="margin-left: 5px;">Rekap Absensi </p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item">
                    <a href="{{ url('/datauser') }}" class="nav-link {{ request()->is('datauser') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-chart-bar"></i>
                        <p style="margin-left: px;">
                            Data Perkembangan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./index.html" class="nav-link">
                                <i class="nav-icon far fa-calendar-alt" style="font-size: 18px; margin-right: 5px;"></i>
                                <p style="margin-left: 5px;">Semester Ganjil</p>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/fitur_guru/data_perkembangan/juli') }}"
                                    class="nav-link {{ request()->is('juli') ? 'active' : '' }}" style="margin-left: 20px;">
                                        <i class="nav-icon fas fa-tachometer-alt" style="margin-right: 5px;"></i>
                                        <p style="margin-left: 5px;">Juli</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link" style="margin-left: 20px;">
                                        <i class="nav-icon fas fa-tachometer-alt" style="margin-right: 5px;"></i>
                                        <p style="margin-left: 5px;">Agustus</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link" style="margin-left: 20px;">
                                        <i class="nav-icon fas fa-tachometer-alt" style="margin-right: 5px;"></i>
                                        <p style="margin-left: 5px;">September</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link" style="margin-left: 20px;">
                                        <i class="nav-icon fas fa-tachometer-alt" style="margin-right: 5px;"></i>
                                        <p style="margin-left: 5px;">Oktober</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link" style="margin-left: 20px;">
                                        <i class="nav-icon fas fa-tachometer-alt" style="margin-right: 5px;"></i>
                                        <p style="margin-left: 5px;">November</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link" style="margin-left: 20px;">
                                        <i class="nav-icon fas fa-tachometer-alt" style="margin-right: 5px;"></i>
                                        <p style="margin-left: 5px;">Desember</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="./index.html" class="nav-link">
                                <i class="nav-icon far fa-calendar-alt" style="font-size: 18px; margin-right: 5px;"></i>
                                <p style="margin-left: 5px;">Semester Genap</p>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link" style="margin-left: 20px;">
                                        <i class="nav-icon fas fa-tachometer-alt" style="margin-right: 5px;"></i>
                                        <p style="margin-left: 5px;">Januari</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link" style="margin-left: 20px;">
                                        <i class="nav-icon fas fa-tachometer-alt" style="margin-right: 5px;"></i>
                                        <p style="margin-left: 5px;">Februari</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link" style="margin-left: 20px;">
                                        <i class="nav-icon fas fa-tachometer-alt" style="margin-right: 5px;"></i>
                                        <p style="margin-left: 5px;">Maret</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link" style="margin-left: 20px;">
                                        <i class="nav-icon fas fa-tachometer-alt" style="margin-right: 5px;"></i>
                                        <p style="margin-left: 5px;">April</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link" style="margin-left: 20px;">
                                        <i class="nav-icon fas fa-tachometer-alt" style="margin-right: 5px;"></i>
                                        <p style="margin-left: 5px;">Mei</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link" style="margin-left: 20px;">
                                        <i class="nav-icon fas fa-tachometer-alt" style="margin-right: 5px;"></i>
                                        <p style="margin-left: 5px;">Juni</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>


                <li class="nav-item">
                    <a href="#" class="nav-link {{ request()->is('grafik_ganjil') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-chart-line"></i>
                        <p>
                            Grafik Perkembangan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/fitur_guru/grafik/grafik_ganjil') }}"
                            class="nav-link {{ request()->is('grafik_ganjil') ? 'active' : '' }}">
                                <i class="nav-icon far fa-calendar-alt" style="font-size: 18px; margin-right: 5px;"></i>
                                <p style="margin-left: 5px;">Semester Ganjil</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/fitur_guru/absensi_siswa/rekap_absensi') }}"
                            class="nav-link {{ request()->is('rekap_absensi') ? 'active' : '' }}">
                                <i class="nav-icon far fa-calendar-alt" style="font-size: 18px; margin-right: 5px;"></i>
                                <p style="margin-left: 5px;">Semester Genap </p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
