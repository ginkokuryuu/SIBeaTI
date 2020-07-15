<?php if($this->session->userdata('role') == "mahasiswa"): ?>
<h1>this will only show if the role is mahasiswa</h1>
<?php elseif($this->session->userdata('role') == "voter"): ?>
<h1>this will only show if the role is voter</h1>
<?php elseif($this->session->userdata('role') == "selektor"): ?>
<h1>this will only show if the role is selektor</h1>
<?php elseif($this->session->userdata('role') == "bendahara"): ?>
<h1>this will only show if the role is bendahara</h1>
<?php endif; ?>

<a href="<?= site_url('auth/logout') ?>" class="btn btn-danger">Logout</a>