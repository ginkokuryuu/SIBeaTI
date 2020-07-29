<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    
    <?php if($this->session->userdata("role") == "mahasiswa") : ?>
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
    <?php endif; ?>
    <?php if($this->session->userdata("role") == "bendahara") : ?>
        <li class="nav-item <?php echo $this->uri->segment(2) == 'upload' ? 'active': '' ?>">
            <a class="nav-link" href="<?php echo site_url('bendahara/upload') ?>">
                <i class="fas fa-fw fa-edit"></i>
                <span>Upload mutasi</span></a>
        </li>
        <li class="nav-item <?php echo $this->uri->segment(2) == 'laporan' ? 'active': '' ?>">
            <a class="nav-link" href="<?php echo site_url('bendahara/laporan') ?>">
                <i class="fas fa-table"></i>
                <span>Laporan</span></a>
        </li>
        <li class="nav-item <?php echo $this->uri->segment(2) == 'bukubesar' ? 'active': '' ?>">
            <a class="nav-link" href="<?php echo site_url('bendahara/edit') ?>">
                <i class="far fa-book"></i>
                <span>Buku Besar</span></a>
        </li>
        <li class="nav-item <?php echo $this->uri->segment(2) == 'perencanaan' ? 'active': '' ?>">
            <a class="nav-link" href="<?php echo site_url('bendahara/perencanaan') ?>">
                <i class="fas fa-calendar"></i>
                <span>Perencanaan</span></a>
        </li>
        <li class="nav-item <?php echo $this->uri->segment(2) == 'suratperintah' ? 'active': '' ?>">
            <a class="nav-link" href="<?php echo site_url('bendahara/suratperintah') ?>">
                <i class="fas fa-file"></i>
                <span>Surat Perintah</span></a>
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
    <?php endif; ?>
</ul>
