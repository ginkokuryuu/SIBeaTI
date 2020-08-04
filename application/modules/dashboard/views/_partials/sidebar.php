<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('dashboard') ?>">
            <i class="fas fa-fw fa-bullhorn"></i>
            <span>Berita</span>
        </a>
    </li>

    <li class="nav-item <?php echo $this->uri->segment(1) == 'biodata' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('biodata/diri') ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Biodata</span></a>
    </li>

    <li class="nav-item <?php echo $this->uri->segment(1) == 'pengajuan' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('pengajuan/periode') ?>">
            <i class="fas fa-fw fa-edit"></i>
            <span>Pengajuan</span></a>
    </li>
</ul>
