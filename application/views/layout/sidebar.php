<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="<?=base_url('home') ?>"> <img alt="image" src="<?= base_url('assets/') ?>template/img/logoR.png" class="header-logo" />
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Menu</li>
            <li class="dropdown active">
                <a href="<?=base_url('home') ?>" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="briefcase"></i><span>Properties</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="<?=base_url('view_property') ?>">Data Property</a>
                    </li>
                    <li>
                        <a class="nav-link" href="<?=base_url('view_user') ?>">Data User</a>
                    </li>
                </ul>
            </li>
</div>