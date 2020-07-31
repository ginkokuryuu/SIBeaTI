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

    <?php if($this->session->userdata("role") == "bendahara") : ?>
        <li class="nav-item <?php echo $this->uri->segment(2) == 'upload' ? 'active': '' ?>">
            <a class="nav-link" href="<?php echo site_url('bendahara/upload') ?>">
                <i class="fas fa-fw fa-edit"></i>
                <span>Upload mutasi</span></a>
        </li>
        <li class="nav-item <?php echo $this->uri->segment(2) == 'edit' ? 'active': '' ?>">
            <a class="nav-link" href="<?php echo site_url('bendahara/edit') ?>">
                <i class="fas fa-fw fa-edit"></i>
                <span>Edit Transaksi</span></a>
        </li>
        <li class="nav-item <?php echo $this->uri->segment(2) == 'crud_ak' ? 'active': '' ?>">
            <a class="nav-link" href="<?php echo site_url('bendahara/crud_ak') ?>">
                <i class="fas fa-fw fa-edit"></i>
                <span>List Kategori dan Akun</span></a>
        </li>
        <li class="nav-item <?php echo $this->uri->segment(2) == 'crud_donatur' ? 'active': '' ?>">
            <a class="nav-link" href="<?php echo site_url('bendahara/crud_donatur') ?>">
                <i class="fas fa-fw fa-edit"></i>
                <span>List Donatur</span></a>
        </li>
        <li class="nav-item <?php echo $this->uri->segment(2) == 'rekap' ? 'active': '' ?>">
            <a class="nav-link" href="<?php echo site_url('bendahara/rekap') ?>">
                <i class="fas fa-fw fa-edit"></i>
                <span>Rekapitulasi</span></a>
        </li>
    <?php endif; ?>
</ul>
