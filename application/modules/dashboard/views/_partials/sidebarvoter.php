<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('dashboard') ?>">
            <i class="fas fa-fw fa-user-plus"></i>
            <span>Pemberian Suara</span>
        </a>
    </li>
</ul>