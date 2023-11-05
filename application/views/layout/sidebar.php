<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="<?= base_url('home') ?>"> <img alt="image" src="<?= base_url('assets/') ?>template/img/logoR.png" class="header-logo" />
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Menu</li>
            <li <?= $this->uri->segment(1) == 'home' ||  $this->uri->segment(1) == '' ? 'class="active"' : '' ?>>
                <a href="<?= site_url('home') ?>" class="nav-link"><i data-feather="home"></i><span>Dashboard</span></a>
            </li>
            <li <?= $this->uri->segment(1) == 'view_property' ||  $this->uri->segment(1) == '' ? 'class="active"' : '' ?>>
                <a href="<?= site_url('view_property') ?>" class="nav-link"><i data-feather="menu"></i><span>Data Property</span></a>
            </li>
            <li>
                <a href="<?= site_url('view_user') ?>" class="nav-link"><i data-feather="user"></i><span>Data User</span></a>
            </li>
            <li>
                <a href="<?= site_url('view_nasabah') ?>" class="nav-link"><i data-feather="menu"></i><span>Data Nasabah</span></a>
            </li>
            <li>
                <a href="<?= site_url('view_article') ?>" class="nav-link"><i data-feather="menu"></i><span>Article</span></a>
            </li>
</div>