  <!-- ======= Sidebar ======= -->


  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      @if($auth->role == 1)
        <li class="nav-item">
          <a class="nav-link collapsed {{ $currentRoute == "admin.dashboard" ? "active" : "" }}" href="/admin/dashboard">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
          </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item {{ $currentRoute == "admin.create" ? "active" : "" }}">
          <a class="nav-link collapsed" href="{{ route("admin.create") }}">
            <i class="bi bi-person-plus-fill"></i>
            <span>Tambah Pegawai</span>
          </a>
        </li>

        {{-- <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#pengaduan-admin" data-bs-toggle="collapse" href="#">
            <i class="bi bi-journal-text"></i><span>Pengaduan</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="pengaduan-admin" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="/aduanmasuk">
                <i class="bi bi-circle"></i><span>Pengaduan Masuk</span>
              </a>
            </li>
            <li>
              <a href="/aduandiproses">
                <i class="bi bi-circle"></i><span>Pengaduan Diproses</span>
              </a>
            </li>
            <li>
              <a href="/aduanditolak">
                <i class="bi bi-circle"></i><span>Pengaduan Ditolak</span>
              </a>
            </li>
            <li>
              <a href="/aduanselesai">
                <i class="bi bi-circle"></i><span>Pengaduan Selesai</span>
              </a>
            </li>
          </ul> --}}
        </li>
      @else
        <li class="nav-item">
          <a class="nav-link collapsed {{ $currentRoute == "masyarakat.index" ? "active" : "" }}" href="/masyarakat">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
          </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
          <a class="nav-link collapsed {{ $currentRoute == "masyarakat.create.aspirasi" ? "active" : "" }}" href="{{ route("masyarakat.create.aspirasi") }}">
            <i class="bi bi-journal-plus"></i>
            <span>Tambah Aspirasi</span>
          </a>
        </li>

        {{-- <li class="nav-item">
          <a class="nav-link collapsed" href="/historyaduan">
            <i class="bi bi-journal-bookmark"></i>
            <span>History Pengaduan</span>
          </a>
        </li> --}}
      @endif
    </ul>

  </aside><!-- End Sidebar-->