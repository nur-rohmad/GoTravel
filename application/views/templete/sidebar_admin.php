<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-plane-departure"></i>
    </div>
    <div class="sidebar-brand-text mx-3"> Go Travel</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active' : '' ?>" >
    <a class="nav-link" href="<?= base_url('admin') ?>">
        <i class="fas fa-home"></i>
        <span>Home</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item  <?php echo $this->uri->segment(2) == 'kotaTujuan' ? 'active' : '' ?>" >
    <a class="nav-link collapsed" href="<?= base_url('admin/kotaTujuan'); ?>" >
        <i class="fas fa-map-marked-alt"></i>
        <span>Kota Tujuan</span>
    </a>
</li>
<hr class="sidebar-divider">
<li class="nav-item  <?php echo $this->uri->segment(2) == 'reservasi' ? 'active' : '' ?>">
    <a class="nav-link collapsed" href="<?= base_url('admin/reservasi'); ?>" >
        <i class="far fa-calendar-check"></i>
        <span>Reservasi</span>
    </a>
</li>
<hr class="sidebar-divider">
<li class="nav-item <?php echo $this->uri->segment(2) == 'pembayaran' ? 'active' : '' ?>">
    <a class="nav-link collapsed" href="<?= base_url('admin/pembayaran') ?>" >
        <i class="far fa-handshake"></i>
        <span>Pembayaran</span>
    </a>
</li>

<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->