<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <i class="fas fa-tie"></i>
        </div>
        <div class="sidebar-brand-text mx-3">ABSENSI PEGAWAI</div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item active">
        <a class="nav-link" href="dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('user.index') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Data User</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('pegawai.index') }}">
            <i class="fas fa-fw fa-user-tie"></i>
            <span>Data Pegawai</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('absensi.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Data Absensi</span>
        </a>
    </li>

   
</ul>
