<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('berita') ?>">
            <i class="fas fa-fw fa-bullhorn"></i>
            <span>Berita</span>
        </a>
    </li>

    <li class="nav-item <?php echo $this->uri->segment(2) == 'biodata' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('biodata') ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Biodata</span></a>
    </li>

    <li class="nav-item <?php echo $this->uri->segment(2) == 'diri' ? 'active': '' ?> <?php echo $this->uri->segment(2) == 'periode' ? 'active': '' ?> <?php echo $this->uri->segment(2) == 'ortu' ? 'active': '' ?> <?php echo $this->uri->segment(2) == 'rumah' ? 'active': '' ?> <?php echo $this->uri->segment(2) == 'cerita' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('pengajuan/periode') ?>">
            <i class="fas fa-fw fa-edit"></i>
            <span>Pengajuan</span></a>
    </li>
</ul>
