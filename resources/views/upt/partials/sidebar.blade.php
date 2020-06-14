  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-success elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('user-style/images/capture2.png')}}" class="brand-image"><br/>
      {{-- <span class="brand-text font-weight-light">UPT UPNVJ</span> --}}

    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#">Selamat datang, {{ Auth::guard('admin')->user()->name }}</a>
        </div>
      </div>
      @php $currRoute = Route::currentRouteName(); @endphp
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link {{ ($currRoute == 'dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p> Dashboard </p>
            </a>
          </li>
          <li class="nav-header"> PELATIHAN </li>
          <li class="nav-item ">
            <a href="{{ route('upt.pelatihan.create') }}" class="nav-link {{ ($currRoute == 'upt.pelatihan.create') ? 'active' : '' }}">
              <i class="fa fa-plus-circle" aria-hidden="true"></i>
              <p>Tambah</p>
            </a>
          </li>
          <li class="nav-item">
            @php
                $pelatihanArrWhen = [
                  'upt.pelatihan.today',
                  'upt.pelatihan.upcoming',
                  'upt.pelatihan.past'
                ]
            @endphp
            <a href="{{ route('upt.pelatihan.today') }}" class="nav-link {{ (in_array($currRoute, $pelatihanArrWhen)) ? 'active' : '' }}">
              <i class="fa fa-list" aria-hidden="true"></i>
              <p>Daftar</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('upt.pelatihan.report')}}" class="nav-link {{ ($currRoute == 'upt.pelatihan.report') ? 'active' : '' }}">
              <i class="fas fa-sticky-note    "></i>
              <p>Laporan</p>
            </a>
          </li>

          <li class="nav-header"> BERITA & PENGUMUMAN </li>
          <li class="nav-item">
            <a href="{{ route('upt.berita.create') }}" class="nav-link {{ ($currRoute == 'upt.berita.create') ? 'active' : '' }}">
              <i class="fa fa-plus-circle" aria-hidden="true"></i>
              <p>Tambah</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('upt.berita.list') }}" class="nav-link {{ ($currRoute == 'upt.berita.list') ? 'active' : '' }}">
              <i class="fa fa-list" aria-hidden="true"></i>
              <p>Daftar</p>
            </a>
          </li>

          <li class="nav-header"> LOWONGAN KERJA & MAGANG </li>
          <li class="nav-item">
            <a href="{{ route('upt.loker.create') }}" class="nav-link {{ ($currRoute == 'upt.loker.create') ? 'active' : '' }}">
              <i class="fa fa-plus-circle" aria-hidden="true"></i>
              <p>Tambah</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('upt.loker.list') }}" class="nav-link {{ ($currRoute == 'upt.loker.list') ? 'active' : '' }}">
              <i class="fa fa-list" aria-hidden="true"></i>
              <p>Daftar</p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>