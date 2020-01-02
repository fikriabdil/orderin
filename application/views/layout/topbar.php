<nav class="navbar navbar-expand-lg static-top navbar-light shadow">
    <a class="navbar-brand font-weight-bold text-darkblue" href="<?= site_url('dashboard') ?>">LOGO</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav ml-auto text-uppercase">
            <li class="nav-item <?= $this->uri->segment(1) == 'dashboard' ? 'active' : '' ?>">
                <a class=" nav-link" href="<?= site_url('dashboard') ?>">Dashboard <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item <?= $this->uri->segment(1) == 'produk' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= site_url('produk') ?>">Produk</a>
            </li>
            <li class="nav-item <?= $this->uri->segment(1) == 'paket' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= site_url('paket') ?>">Paket Produk</a>
            </li>
            <li class="nav-item <?= $this->uri->segment(1) == 'stok' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= site_url('stok') ?>">Stok</a>
            </li>
            <li class="nav-item <?= $this->uri->segment(1) == 'penjualan' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= site_url('penjualan') ?>">Penjualan</a>
            </li>
            <li class="nav-item <?= $this->uri->segment(1) == 'iklan' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= site_url('iklan') ?>">Iklan</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fas fa-user fa-sm fa-fw"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <a href="<?= site_url('profil') ?>" class="dropdown-item w-100"><span class="fas fa-user-circle mr-2"></span>Profil</a>
                    <a href="#" id="logoutTop" class="dropdown-item w-100" data-toggle="modal" data-target="#logoutModal"><span class="fas fa-power-off mr-2"></span>Keluar</a>
                </div>
            </li>
        </ul>
    </div>
</nav>