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
        background-color: #164762 !important;
        /* Ganti #your-desired-color dengan warna yang Anda inginkan */
        color: white !important;
        /* Mengubah warna teks menjadi putih */
    }
        .main-sidebar .nav-link.sub1active {
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
                <i class="fas fa-user-circle fa-5x" style="color: rgb(251, 242, 242);"></i>
                <!-- <img src="{{ asset('adminlte-v3') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                    alt="User Image" style="max-width: 100%; height: auto; width: 50%; height: 50%;"> -->
            </div>
            <div class="info">
                <a href="#" class="d-block" style="color: white;">Hi, {{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-4">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview ">
                    <a href="{{ url('/guru') }}" class="nav-link {{ request()->is('guru') ? 'active' : '' }}">
                        <i class="fas fa-home nav-icon"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('profil_guru') }}"
                        class="nav-link {{ request()->is('guru/profil*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-solid fa-user-tie"></i>
                        <p>
                            Profil Guru
                        </p>
                    </a>
                </li>

                <li
                    class="nav-item {{ request()->is('absensi_siswa') || request()->is('rekap_absensi')? 'menu-open' : '' }}">
                    <a href="{{ url('absensi_siswa') }}"
                        class="nav-link {{ request()->is('absensi_siswa') || request()->is('rekap_absensi')? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-signature"></i>
                        <p>
                            Absensi
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('absensi_siswa') }}"
                                class="nav-link {{ request()->is('absensi_siswa') ? 'subactive' : '' }}">
                                <i class="nav-icon fas fa-list" style="font-size: 18px; margin-right: 5px;"></i>
                                <p style="margin-left: 5px;">Absensi Siswa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('rekap_absensi') }}"
                                class="nav-link {{ request()->is('rekap_absensi') ? 'subactive' : '' }}">
                                <i class="nav-icon fas fa-file" style="font-size: 18px; margin-right: 5px;"></i>
                                <p style="margin-left: 5px;">Rekap Absensi </p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item {{ request()->is('dataperkembangan*') ? 'menu-open' : '' }}">
                    <a href="{{ url('dataperkembangan*') }}"
                        class="nav-link {{request()->is('dataperkembangan/1') || request()->is('dataperkembangan/1?*') || request()->is('dataperkembangan/1/*') || request()->is('dataperkembangan/2*') || request()->is('dataperkembangan/3*') || request()->is('dataperkembangan/4*') || request()->is('dataperkembangan/5*') || request()->is('dataperkembangan/6*') || request()->is('dataperkembangan/7*') || request()->is('dataperkembangan/8*') || request()->is('dataperkembangan/9*') || request()->is('dataperkembangan/10*') || request()->is('dataperkembangan/11*') || request()->is('dataperkembangan/12*')? 'active' : '' }}">
                        <i class="nav-icon fas fa-chart-bar"></i>
                        <p style="margin-left: px;">
                            Data Perkembangan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li
                            class="nav-item {{ request()->is('dataperkembangan/7*') || request()->is('dataperkembangan/8*') || request()->is('dataperkembangan/9*') || request()->is('dataperkembangan/10*') || request()->is('dataperkembangan/11*') || request()->is('dataperkembangan/12*') ? 'menu-open' : '' }}">
                            <a href="{{ url('dataperkembangan*') }}"
                            class="nav-link {{ request()->is('dataperkembangan/7*') || request()->is('dataperkembangan/8*') || request()->is('dataperkembangan/9*') || request()->is('dataperkembangan/10*') || request()->is('dataperkembangan/11*') || request()->is('dataperkembangan/12*')? 'sub1active' : '' }}">
                                <i class="nav-icon far fa-calendar-alt" style="font-size: 18px; margin-right: 5px;"></i>
                                <p style="margin-left: 5px;">Semester Ganjil</p>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/dataperkembangan/7') }}"
                                        class="nav-link {{ request()->is('dataperkembangan/7*') ? 'subactive' : '' }}"
                                        style="margin-left: 20px;">
                                        <i class="nav-icon fas fa-tachometer-alt" style="margin-right: 5px;"></i>
                                        <p style="margin-left: 5px;">Juli</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/dataperkembangan/8') }}"
                                        class="nav-link {{ request()->is('dataperkembangan/8*') ? 'subactive' : '' }}"
                                        style="margin-left: 20px;">
                                        <i class="nav-icon fas fa-tachometer-alt" style="margin-right: 5px;"></i>
                                        <p style="margin-left: 5px;">Agustus</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/dataperkembangan/9') }}"
                                        class="nav-link {{ request()->is('dataperkembangan/9*') ? 'subactive' : '' }}"
                                        style="margin-left: 20px;">
                                        <i class="nav-icon fas fa-tachometer-alt" style="margin-right: 5px;"></i>
                                        <p style="margin-left: 5px;">September</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/dataperkembangan/10') }}"
                                        class="nav-link {{ request()->is('dataperkembangan/10*') ? 'subactive' : '' }}"
                                        style="margin-left: 20px;">
                                        <i class="nav-icon fas fa-tachometer-alt" style="margin-right: 5px;"></i>
                                        <p style="margin-left: 5px;">Oktober</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/dataperkembangan/11') }}"
                                        class="nav-link {{ request()->is('dataperkembangan/11*') ? 'subactive' : '' }}"
                                        style="margin-left: 20px;">
                                        <i class="nav-icon fas fa-tachometer-alt" style="margin-right: 5px;"></i>
                                        <p style="margin-left: 5px;">November</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/dataperkembangan/12') }}"
                                        class="nav-link {{ request()->is('dataperkembangan/12*') ? 'subactive' : '' }}"
                                        style="margin-left: 20px;">
                                        <i class="nav-icon fas fa-tachometer-alt" style="margin-right: 5px;"></i>
                                        <p style="margin-left: 5px;">Desember</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item {{ request()->is('dataperkembangan/1') || request()->is('dataperkembangan/1?*') || request()->is('dataperkembangan/1/*') || request()->is('dataperkembangan/2*') || request()->is('dataperkembangan/3*') || request()->is('dataperkembangan/4*') || request()->is('dataperkembangan/5*') || request()->is('dataperkembangan/6*') ? 'menu-open' : '' }}">
                            <a href="{{ url('dataperkembangan*') }}"
                            class="nav-link {{request()->is('dataperkembangan/1') || request()->is('dataperkembangan/1?*') || request()->is('dataperkembangan/1/*') || request()->is('dataperkembangan/2*') || request()->is('dataperkembangan/3*') || request()->is('dataperkembangan/4*') || request()->is('dataperkembangan/5*') || request()->is('dataperkembangan/6*')? 'sub1active' : '' }}">
                                <i class="nav-icon far fa-calendar-alt" style="font-size: 18px; margin-right: 5px;"></i>
                                <p style="margin-left: 5px;">Semester Genap</p>
                                <i class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/dataperkembangan/1') }}"
                                        class="nav-link {{ request()->is('dataperkembangan/1') || request()->is('dataperkembangan/1?*') || request()->is('dataperkembangan/1/*') ? 'subactive' : '' }}"
                                        style="margin-left: 20px;">
                                        <i class="nav-icon fas fa-tachometer-alt" style="margin-right: 5px;"></i>
                                        <p style="margin-left: 5px;">Januari</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/dataperkembangan/2') }}"
                                        class="nav-link {{ request()->is('dataperkembangan/2*') ? 'subactive' : '' }}"
                                        style="margin-left: 20px;">
                                        <i class="nav-icon fas fa-tachometer-alt" style="margin-right: 5px;"></i>
                                        <p style="margin-left: 5px;">Februari</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/dataperkembangan/3') }}"
                                        class="nav-link {{ request()->is('dataperkembangan/3*') ? 'subactive' : '' }}"
                                        style="margin-left: 20px;">
                                        <i class="nav-icon fas fa-tachometer-alt" style="margin-right: 5px;"></i>
                                        <p style="margin-left: 5px;">Maret</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/dataperkembangan/4') }}"
                                        class="nav-link {{ request()->is('dataperkembangan/4*') ? 'subactive' : '' }}"
                                        style="margin-left: 20px;">
                                        <i class="nav-icon fas fa-tachometer-alt" style="margin-right: 5px;"></i>
                                        <p style="margin-left: 5px;">April</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/dataperkembangan/5') }}"
                                        class="nav-link {{ request()->is('dataperkembangan/5*') ? 'subactive' : '' }}"
                                        style="margin-left: 20px;">
                                        <i class="nav-icon fas fa-tachometer-alt" style="margin-right: 5px;"></i>
                                        <p style="margin-left: 5px;">Mei</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/dataperkembangan/6') }}"
                                        class="nav-link {{ request()->is('dataperkembangan/6*') ? 'subactive' : '' }}"
                                        style="margin-left: 20px;">
                                        <i class="nav-icon fas fa-tachometer-alt" style="margin-right: 5px;"></i>
                                        <p style="margin-left: 5px;">Juni</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="nav-item {{ request()->is('grafikperkembangan/*') ? 'menu-open' : '' }}">
                    <a href=<a href="{{ url('grafikperkembangan/*') }}"
                    class="nav-link {{ request()->is('grafikperkembangan/ganjil*') || request()->is('grafikperkembangan/genap*')? 'active' : '' }}">
                        <i class="nav-icon fas fa-chart-line"></i>
                        <p>
                            Grafik Perkembangan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('grafikperkembangan/ganjil') }}"
                                class="nav-link {{ request()->is('grafikperkembangan/ganjil*') ? 'subactive' : '' }}">
                                <i class="nav-icon far fa-calendar-alt" style="font-size: 18px; margin-right: 5px;"></i>
                                <p style="margin-left: 5px;">Semester Ganjil</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('grafikperkembangan/genap') }}"
                                class="nav-link {{ request()->is('grafikperkembangan/genap*') ? 'subactive' : '' }}">
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
