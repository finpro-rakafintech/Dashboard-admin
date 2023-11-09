<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="<?= base_url('home') ?>"> <img alt="image" src="<?= base_url('assets/') ?>template/img/logoR.png" class="header-logo" />
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Menu</li>
            <li <?= $this->uri->segment(1) == 'home' ? 'class="active"' : '' ?>>
                <a href="<?= site_url('home') ?>" class="nav-link"><i data-feather="home"></i><span>Dashboard</span></a>
            </li>
            <li <?= $this->uri->segment(1) == 'view_article' ||  
                    $this->uri->segment(1) == 'page_create_article' || 
                    $this->uri->segment(1) == 'page_update_article' ? 'class="active"' : '' ?>>
                <a href="<?= site_url('view_article') ?>" class="nav-link"><i data-feather="book-open"></i><span>Article</span></a>
            </li>
            <li <?= $this->uri->segment(1) == 'view_property' ||  
                    $this->uri->segment(1) == 'page_create_property' || 
                    $this->uri->segment(1) == 'page_update_property' ? 'class="active"' : '' ?>>
                <a href="<?= site_url('view_property') ?>" class="nav-link"><i data-feather="shopping-bag"></i><span>Data Property</span></a>
            </li>
            <li <?= $this->uri->segment(1) == 'view_user' ||  
                    $this->uri->segment(1) == 'page_create_user' || 
                    $this->uri->segment(1) == 'page_update_user' ? 'class="active"' : '' ?>>
                <a href="<?= site_url('view_user') ?>" class="nav-link"><i data-feather="users"></i><span>Data User</span></a>
            </li>
            <li <?= $this->uri->segment(1) == 'view_nasabah' ||  
                    $this->uri->segment(1) == 'page_create_nasabah' || 
                    $this->uri->segment(1) == 'page_update_nasabah' ? 'class="active"' : '' ?>>
                <a href="<?= site_url('view_nasabah') ?>" class="nav-link"><i data-feather="user"></i><span>Data Nasabah</span></a>
            </li>
            <li <?= $this->uri->segment(1) == 'view_pengajuan' ||  
                    $this->uri->segment(1) == 'page_update_pengajuan' ? 'class="active"' : '' ?>>
                <a href="<?= site_url('view_pengajuan') ?>" class="nav-link"><i data-feather="file"></i><span>Data Pengajuan</span></a>
            </li>
</div>