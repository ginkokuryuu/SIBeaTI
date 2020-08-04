<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('dashboard') ?>">
            <i class="fas fa-fw fa-user-plus"></i>
            <span>Seleksi Akhir</span>
        </a>
    </li>

    <li class="nav-item <?php echo $this->uri->segment(2) == 'berita' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('kelolaberita/berita') ?>">
            <i class="fas fa-fw fa-bullhorn"></i>
            <span>Kelola Berita</span></a>
    </li>

    <li class="nav-item <?php echo $this->uri->segment(2) == 'beasiswa' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('kelolabeasiswa/beasiswa') ?>">
            <i class="fas fa-fw fa-graduation-cap"></i>
            <span>Kelola Beasiswa</span></a>
    </li>
</ul>