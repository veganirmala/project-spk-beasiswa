<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon">
            <i class="fas fa-university"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SI BEASISWA</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">


    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('Dashboard'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        <!-- Interface -->
        Kelola Data
    </div>
    <!-- Nav Item - User -->
    <li class="nav-item">
        <!-- <?= $this->uri->segment(1) == 'user' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?> -->
        <a class="nav-link" href="<?= base_url('user/user'); ?>">
            <i class="fas fa-user"></i>
            <span>Data User</span></a>
    </li>

    <!-- Nav Item - Fakultas -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('fakultas/fakultas'); ?>">
            <i class="fas fa-school"></i>
            <span>Data Fakultas</span></a>
    </li>

    <!-- Nav Item - Jurusan -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('jurusan/jurusan'); ?>">
            <i class="fas fa-chalkboard-teacher"></i>
            <span>Data Jurusan</span></a>
    </li>

    <!-- Nav Item - Prodi -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('prodi/prodi'); ?>">
            <i class="fas fa-chalkboard"></i>
            <span>Data Prodi</span></a>
    </li>

    <!-- Nav Item - Mahasiswa -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('mahasiswa/mahasiswa'); ?>">
            <i class="fas fa-users"></i>
            <span>Data Mahasiswa</span></a>
    </li>

    <!-- Nav Item - Tahun Usulan -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('thusulan/usulan'); ?>">
            <i class="far fa-calendar"></i>
            <span>Data Tahun Usulan</span></a>
    </li>

    <!-- Nav Item - Prestasi Bidang -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('prestasibidang/bidang'); ?>">
            <i class="fas fa-award"></i>
            <span>Data Prestasi Bidang</span></a>
    </li>

    <!-- Nav Item - Prestasi -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('prestasi/prestasi'); ?>">
            <i class="fas fa-book"></i>
            <span>Data Prestasi</span></a>
    </li>

    <!-- Nav Item - Kepribadian -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('kepribadian/kepribadian'); ?>">
            <i class="fas fa-clipboard-list"></i>
            <span>Data Kepribadian</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Rekap Hasil Seleksi -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('rekap/rekap'); ?>">
            <i class="fas fa-graduation-cap"></i>
            <span>Data Rekap Hasil Seleksi</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->