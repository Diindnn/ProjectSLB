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
        <div class="user-panel  d-flex">
            <div class="image">
                <!-- Ganti gambar dengan ikon user dari Font Awesome dengan ukuran dan warna yang diinginkan -->
                <i class="fas fa-user-circle fa-5x" style="color: rgb(251, 242, 242);"></i>
            </div>
            <div class="info">
                <a href="#" class="d-block" style="color: white;">Hi, Alfina</a>
            </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-4">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview ">
                    <a href="{{ url('/orangtua') }}"
                    class="nav-link {{ request()->is('orangtua') ? 'active' : '' }}">
                        <i class="fas fa-home nav-icon"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/fitur_orangtua/data_perkembangan/bulan_juli/juli') }}"
                    class="nav-link {{ request()->is('fitur_guru/data_perkembangan/juli') ? 'active' : '' }}">
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
                                    <a href="{{ url('/fitur_orangtua/data_perkembangan/bulan_juli/juli') }}"
                                    class="nav-link {{ request()->is('juli') ? 'active' : '' }}" style="margin-left: 20px;">
                                        <i class="nav-icon fas fa-tachometer-alt" style="margin-right: 5px;"></i>
                                        <p style="margin-left: 5px;">Juli</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/fitur_orangtua/data_perkembangan/bulan_agustus/agustus') }}"
                                    class="nav-link {{ request()->is('agustus') ? 'active' : '' }}" style="margin-left: 20px;">
                                        <i class="nav-icon fas fa-tachometer-alt" style="margin-right: 5px;"></i>
                                        <p style="margin-left: 5px;">Agustus</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/fitur_orangtua/data_perkembangan/bulan_september/september') }}"
                                    class="nav-link {{ request()->is('september') ? 'active' : '' }}" style="margin-left: 20px;">
                                        <i class="nav-icon fas fa-tachometer-alt" style="margin-right: 5px;"></i>
                                        <p style="margin-left: 5px;">September</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/fitur_orangtua/data_perkembangan/bulan_oktober/oktober') }}"
                                    class="nav-link {{ request()->is('oktober') ? 'active' : '' }}" style="margin-left: 20px;">
                                        <i class="nav-icon fas fa-tachometer-alt" style="margin-right: 5px;"></i>
                                        <p style="margin-left: 5px;">Oktober</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/fitur_orangtua/data_perkembangan/bulan_november/november') }}"
                                    class="nav-link{{ request()->is('november') ? 'active' : '' }}" style="margin-left: 20px;">
                                        <i class="nav-icon fas fa-tachometer-alt" style="margin-right: 5px;"></i>
                                        <p style="margin-left: 5px;">November</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/fitur_orangtua/data_perkembangan/bulan_desember/desember') }}"
                                    class="nav-link{{ request()->is('desember') ? 'active' : '' }}" style="margin-left: 20px;">
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
                                    <a href="{{ url('/fitur_orangtua/data_perkembangan/bulan_januari/januari') }}"
                                    class="nav-link{{ request()->is('januari') ? 'active' : '' }}" style="margin-left: 20px;">
                                        <i class="nav-icon fas fa-tachometer-alt" style="margin-right: 5px;"></i>
                                        <p style="margin-left: 5px;">Januari</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/fitur_orangtua/data_perkembangan/bulan_februari/februari') }}"
                                    class="nav-link{{ request()->is('februari') ? 'active' : '' }}" style="margin-left: 20px;">
                                        <i class="nav-icon fas fa-tachometer-alt" style="margin-right: 5px;"></i>
                                        <p style="margin-left: 5px;">Februari</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/fitur_orangtua/data_perkembangan/bulan_maret/maret') }}"
                                    class="nav-link{{ request()->is('maret') ? 'active' : '' }}" style="margin-left: 20px;">
                                        <i class="nav-icon fas fa-tachometer-alt" style="margin-right: 5px;"></i>
                                        <p style="margin-left: 5px;">Maret</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/fitur_orangtua/data_perkembangan/bulan_april/april') }}"
                                    class="nav-link{{ request()->is('april') ? 'active' : '' }}" style="margin-left: 20px;">
                                        <i class="nav-icon fas fa-tachometer-alt" style="margin-right: 5px;"></i>
                                        <p style="margin-left: 5px;">April</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/fitur_orangtua/data_perkembangan/bulan_mei/mei') }}"
                                    class="nav-link{{ request()->is('mei') ? 'active' : '' }}" style="margin-left: 20px;">
                                        <i class="nav-icon fas fa-tachometer-alt" style="margin-right: 5px;"></i>
                                        <p style="margin-left: 5px;">Mei</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('/fitur_orangtua/data_perkembangan/bulan_juni/juni') }}" class="nav-link{{ request()->is('juni') ? 'active' : '' }}" style="margin-left: 20px;">
                                        <i class="nav-icon fas fa-tachometer-alt" style="margin-right: 5px;"></i>
                                        <p style="margin-left: 5px;">Juni</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ url('/fitur_orantua/grafik/grafik_ganjil') }}"
                class="nav-link {{ request()->is('fitur_orangtua/grafik/grafik_ganjil') || request()->is('fitur_orangtua/grafik/grafik_genap')? 'active' : '' }}">
                    <i class="nav-icon fas fa-chart-line"></i>
                    <p>
                        Grafik Perkembangan
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/fitur_orangtua/grafik/grafik_ganjil') }}"
                            class="nav-link {{ request()->is('fitur_orangtua/grafik/grafik_ganjil') ? 'subactive' : '' }}">
                                <i class="nav-icon far fa-calendar-alt" style="font-size: 18px; margin-right: 5px;"></i>
                                <p style="margin-left: 5px;">Semester Ganjil</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/fitur_guru/grafik/grafik_genap') }}"
                            class="nav-link {{ request()->is('fitur_orangua/grafik/grafik_genap') ? 'subactive' : '' }}">
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
