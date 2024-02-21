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
  color: white !important; /* Mengubah warna tulisan menjadi putih */
}
.main-sidebar .nav-link.active {
  background-color: #ffffff !important; /* Ganti #your-desired-color dengan warna yang Anda inginkan */
  color: black !important; /* Mengubah warna teks menjadi putih */
}
.main-sidebar .nav-link.subactive {
  background-color: #203E4E !important; /* Ganti #your-desired-color dengan warna yang Anda inginkan */
  color: white !important; /* Mengubah warna teks menjadi putih */
}

</style>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4" style="background-color: #315E77;" >
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('adminlte-v3')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"  style="max-width: 100%; height: auto; width: 50%; height: 50%;">
        </div>
        <div class="info">
          <a href="#" class="d-block" style="color: white;">Hi, Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-4">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview ">
            <a href="{{ url('/') }}" class="nav-link {{ (request()->is('/')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>

          </li>
          <li class="nav-item">
            <a href="{{ url('/dataguru') }}" class="nav-link {{ request()->is('dataguru') || request()->is('tambahdataguru')   ? 'active' : '' }}">
              <i class="nav-icon fas fa-solid fa-user-tie"></i>
              <p>
                Data Guru
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/datasiswa') }}" class="nav-link {{ request()->is('datasiswa') ? 'active' : '' }}">
              <i class="nav-icon fas fa-solid fa-user"></i>
              <p>
                Data Siswa
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/datauser') }}" class="nav-link {{ request()->is('datauser') ? 'active' : '' }}">
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
