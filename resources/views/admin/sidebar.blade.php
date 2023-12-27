<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        @if(auth()->user()->role=="peserta")
      <li class="nav-item">
        <a class="nav-link collapsed" href="/dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="/profile/{id}">
          <i class="bi bi-people"></i>
          <span>Profile</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="/administrasi">
          <i class="bi bi-building-down"></i>
          <span>Administrasi</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="/kegiatan_peserta_create">
          <i class="bi bi-calendar-week"></i>
          <span>Timeline Kegiatan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-bookmark-plus"></i>
          <span>Penilaian Konversi</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-folder"></i>
          <span>Final Project</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-gear"></i>
          <span>Pengaturan</span>
        </a>
      </li>
      @elseif(auth()->user()->role=="admin")
      <li class="nav-item">
        <a class="nav-link collapsed" href="/dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Master Data</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/datamitra">
              <i class="bi bi-circle"></i><span>Data Mitra</span>
            </a>
          </li>
          <li>
            <a href="/datadosen">
              <i class="bi bi-circle"></i><span>Data Dospem</span>
            </a>
          </li>
          <li>
            <a href="/datapeserta">
              <i class="bi bi-circle"></i><span>Data Peserta</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="/kategori-adm">
          <i class="bi bi-building-down"></i>
          <span>Administrasi</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="/kegiatan">
          <i class="bi bi-calendar-week"></i>
          <span>Timeline Kegiatan</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-bookmark-plus"></i>
          <span>Penilaian Konversi</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-folder"></i>
          <span>Final Project</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-gear"></i>
          <span>Pengaturan</span>
        </a>
      </li>
      @endif
      <li class="nav-item">
        <a class="nav-link collapsed" href="/logout ">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Log Out</span>
        </a>
      </li><!-- End Login Page Nav -->
    </ul>

  </aside><!-- End Sidebar-->
