<?php if (session()->level_iduser == 1 ): ?>
    <li class="menu-header">Menu Koordinator</li>
    <li><a class="nav-link" href="<?= site_url('home') ?>"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
    <!--<li><a class="nav-link" href="--><?php //= site_url("dosen") ?><!--"><i class="far fa-square"></i> <span>Main Menu</span></a>-->
    </li>
    <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-database"></i> <span>Master</span></a>
        <ul class="dropdown-menu">
            <li><a class="nav-link" href="<?= site_url('dosen') ?>">Dosen</a></li>
<!--            <li><a class="nav-link" href="--><?php //= site_url('mahasiswaapi') ?><!--">Operator</a></li>-->
            <li><a class="nav-link" href="<?= site_url('mahasiswa') ?>">Mahasiswa</a></li>
        </ul>
    </li>
    <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-file-alt"></i> <span>Cek Berkas</span></a>
        <ul class="dropdown-menu">
            <li><a class="nav-link" href="<?= site_url('dafskripsi') ?>">Daftar Skripsi</a></li>
            <li><a class="nav-link" href="<?= site_url('dafsempro') ?>">Daftar Seminar Proposal</a></li>
        </ul>
    </li>
    <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-calendar-plus"></i> <span>Penjadwalan</span></a>
        <ul class="dropdown-menu">
            <li><a class="nav-link" href="<?= site_url('sempro') ?>">Seminar</a></li>
            <li><a class="nav-link" href="<?= site_url('ruangan') ?>">Ruangan</a></li>
        </ul>
    </li>
<!--    <li class="nav-item dropdown">-->
<!--        <a href="#" class="nav-link has-dropdown"><i class="fas fa-table"></i> <span>Seminar</span></a>-->
<!--        <ul class="dropdown-menu">-->
<!--            <li><a class="nav-link" href="--><?php //= site_url('detsempro') ?><!--">Hasil Seminar</a></li>-->
<!--        </ul>-->
<!--    </li>-->
    <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i> <span>Kelola User</span></a>
        <ul class="dropdown-menu">
            <li><a class="nav-link" href="<?= site_url('user') ?>">User</a></li>
            <li><a class="nav-link" href="<?= site_url('ruangan') ?>">Level User</a></li>
        </ul>
    </li>
<?php endif; ?>

<?php if (session()->level_iduser == 2 ): ?>
    <li class="menu-header">Menu Operator</li>
    <li><a class="nav-link" href="<?= site_url("dafsempro") ?>"><i class="fas fa-file-alt"></i> <span>Cek Berkas</span></a>
    </li>
<?php endif; ?>
