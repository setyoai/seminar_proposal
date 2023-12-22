<li class="menu-header">Menu Koordinator</li>
<li><a class="nav-link" href="<?= site_url('home') ?>"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
<li><a class="nav-link" href="<?= site_url("main_menu") ?>"><i class="far fa-square"></i> <span>Main Menu</span></a>
</li>
<li class="nav-item dropdown">
    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Master</span></a>
    <ul class="dropdown-menu">
        <li><a class="nav-link" href="layout-default.html">Dosen</a></li>
        <li><a class="nav-link" href="layout-transparent.html">Operator</a></li>
        <li><a class="nav-link" href="<?= site_url('mahasiswa') ?>">Mahasiswa</a></li>
    </ul>
</li>
<li><a class="nav-link" href="<?= site_url("dafsempro") ?>"><i class="far fa-square"></i> <span>Cek Berkas</span></a>
</li>
<li class="nav-item dropdown">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Penjadwalan</span></a>
    <ul class="dropdown-menu">
        <li><a class="nav-link" href="<?= site_url('sempro') ?>">Seminar</a></li>
        <li><a class="nav-link" href="<?= site_url('ruangan') ?>">Ruangan</a></li>
    </ul>
</li>
    