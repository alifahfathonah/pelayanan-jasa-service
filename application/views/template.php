<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Harco Elektronik Service</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/modules/fontawesome/css/all.min.css">
    <link href="<?= base_url() ?>assets/dataTable2/datatables.min.css" rel="stylesheet" />

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/jquery-ui/jquery-ui.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/modules/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/modules/jquery-selectric/selectric.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/mystyle.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/components.css">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <!-- <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=geometry"></script> -->
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyB4o-DeKb-TUieFYekF9XZHOKTL3tm4aWI&libraries=geometry"></script>
    <style>
        #ikon {
            position: relative
        }

        .jumlah {
            position: absolute;
            background-color: red;
            border-radius: 100%;
            height: 20px;
            padding: 2px 6px;
            font-size: 12px;
            top: -5px;
            line-height: 15px;
            left: 6px;
            font-weight: 600;
        }
    </style>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <script src="<?= base_url('assets/js/jquery-3.1.1.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/myscript.js') ?>"></script>
    <script src="<?= base_url() ?>assets/js/notif.js"></script>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown dropdown-list-toggle"><a id="tombol_notif" href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg"><i id="ikon" class="far fa-bell"><span class="jumlah"></span></i></a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right">
                            <div class="infoNotif">
                            </div>
                        </div>
                    </li>
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <?php if ($this->session->userdata('id_user')) { ?>
                                <img alt="image" src="<?= base_url() ?>assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                                <div class="d-sm-none d-lg-inline-block"><?= 'Hi, ' . $this->fungsi->user_login()->nama ?></div>
                            <?php } else { ?>
                                <button data-toggle="modal" data-target="#modal-5" class="btn btn-warning">Login</button>
                            <?php } ?>
                        </a>
                        <?php if ($this->session->userdata('id_user')) : ?>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-title">Logged in 5 min ago</div>
                                <div class="dropdown-divider"></div>
                                <a href="<?= base_url('auth/logout') ?>" class="dropdown-item has-icon text-danger">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </a>
                            </div>
                        <?php endif; ?>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="index.html">Harco Elektronik</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="index.html">HE</a>
                    </div>
                    <div class="mb-1 p-3 hide-sidebar-mini">
                        <a href="#" class="btn btn-primary btn-lg btn-block btn-icon-split">
                            <?= ucfirst($this->fungsi->user_login()->level) ?>
                        </a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Beranda</li>
                        <?php if ($this->fungsi->user_login()->level == 'pelayanan') { ?>
                            <li <?= $this->uri->segment('1') == 'pelayanan' && $this->uri->segment(2) == '' || $this->uri->segment(2) == 'beranda' ? 'class="active"' : '' ?>>
                                <a class="nav-link" href="<?= base_url('pelayanan') ?>"><i class="fas fa-fire"></i> <span>Beranda</span></a>
                            </li>
                            <script>
                                cek()
                            </script>
                        <?php } ?>
                        <?php if ($this->fungsi->user_login()->level == 'pimpinan') { ?>
                            <li <?= $this->uri->segment('1') == '_pimpinan' && $this->uri->segment(2) == '' || $this->uri->segment(2) == 'beranda' ? 'class="active"' : '' ?>>
                                <a class="nav-link" href="<?= base_url('_pimpinan/beranda') ?>"><i class="fas fa-fire"></i> <span>Beranda</span></a>
                            </li>
                            <script>
                                cekPimpinan()
                            </script>
                        <?php } ?>
                        <?php if ($this->fungsi->user_login()->level == 'teknisi') { ?>
                            <li <?= $this->uri->segment('1') == '_teknisi' && $this->uri->segment(2) == 'beranda' || $this->uri->segment(2) == 'beranda' ? 'class="active"' : '' ?>>
                                <a class="nav-link" href="<?= base_url('_teknisi/beranda') ?>"><i class="fas fa-fire"></i> <span>Beranda</span></a>
                            </li>
                        <?php } ?>
                        <?php if ($this->fungsi->user_login()->level == 'teknisi') { ?>
                            <li class="menu-header">Tansaksi</li>
                            <li <?= $this->uri->segment('1') == '_teknisi' && $this->uri->segment(2) == 'surat' ? 'class="active"' : '' ?>>
                                <a class="nav-link" href="<?= base_url('_teknisi/surat') ?>"><i class="far fa-envelope"></i> <span>Surat Perintah Kerja</span></a>
                            </li>
                            <li <?= $this->uri->segment('1') == '_teknisi' && $this->uri->segment(2) == 'pembayaran' ? 'class="active"' : '' ?>>
                                <a class="nav-link" href="<?= base_url('_teknisi/pembayaran') ?>"><i class="fas fa-money-bill-wave"></i> <span>Pembayaran</span></a>
                            </li>
                        <?php } ?>
                        <?php if ($this->fungsi->user_login()->level == 'pimpinan') { ?>
                            <li class="menu-header">Tansaksi</li>
                            <li <?= $this->uri->segment('1') == '_pimpinan' && $this->uri->segment(2) == 'surat' ? 'class="active"' : '' ?>>
                                <a class="nav-link" href="<?= base_url('_pimpinan/surat') ?>"><i class="far fa-envelope"></i> <span>Surat Perintah Kerja</span></a>
                            </li>
                        <?php } ?>
                        <?php if ($this->fungsi->user_login()->level == 'pelayanan') { ?>
                            <li class="menu-header">Master Data</li>
                            <li <?= $this->uri->segment('1') == 'pelayanan' && $this->uri->segment(2) == 'user' ? 'class="active"' : '' ?>>
                                <a class="nav-link" href="<?= base_url('pelayanan/user') ?>"><i class="far fa-user"></i> <span>User</span></a>
                            </li>
                            <li class="dropdown <?= $this->uri->segment('1') == 'authorized' || $this->uri->segment('1') == 'barang' || $this->uri->segment('1') == 'sparepart' && $this->uri->segment(2) == '' || $this->uri->segment('1') == 'perkiraan' ? 'active' : '' ?>">
                                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Data</span></a>
                                <ul class="dropdown-menu">
                                    <li <?= $this->uri->segment('1') == 'authorized' ? 'class="active"' : '' ?>><a class="nav-link" href="<?= base_url('authorized') ?>">Authorized</a></li>
                                    <li <?= $this->uri->segment('1') == 'barang' ? 'class="active"' : '' ?>><a class="nav-link" href="<?= base_url('barang') ?>">Barang Elektornik</a></li>
                                    <li <?= $this->uri->segment('1') == 'sparepart' && $this->uri->segment(2) == '' ? 'class="active"' : '' ?>><a class="nav-link" href="<?= base_url('sparepart') ?>">Sparepart</a></li>
                                    <li <?= $this->uri->segment('1') == 'perkiraan' ? 'class="active"' : '' ?>><a class="nav-link" href="<?= base_url('perkiraan') ?>">Perkiaan Biaya</a></li>
                                </ul>
                            </li>
                            <li <?= $this->uri->segment('1') == 'sparepart' && $this->uri->segment(2) == 'pasok' ? 'class="active"' : '' ?>>
                                <a class="nav-link" href="<?= base_url('sparepart/pasok') ?>"><i class="fas fa-cart-plus"></i> <span>Pasok</span></a>
                            </li>
                            <li class="menu-header">Transaksi</li>
                            <li <?= $this->uri->segment('1') == 'pelanggan' ? 'class="active"' : '' ?>><a class="nav-link" href="<?= base_url('pelanggan') ?>"><i class="far fa-user"></i> <span>Pelanggan</span></a></li>
                            <li class="dropdown <?= $this->uri->segment('1') == 'keluhan' || $this->uri->segment('1') == 'nomor' || $this->uri->segment('1') == 'surat' && $this->uri->segment(2) == '' || $this->uri->segment('1') == 'surat' && $this->uri->segment(2) == 'detail' ? 'active' : '' ?>">
                                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Service</span></a>
                                <ul class="dropdown-menu">
                                    <li <?= $this->uri->segment('1') == 'keluhan' ? 'class="active"' : '' ?>><a class="nav-link" href="<?= base_url('keluhan') ?>">Keluhan</a></li>
                                    <li <?= $this->uri->segment('1') == 'nomor' ? 'class="active"' : '' ?>><a class="nav-link" href="<?= base_url('nomor') ?>">Nomor Perbaikan</a></li>
                                    <li <?= $this->uri->segment('1') == 'surat' || $this->uri->segment('2') == 'detail' ? 'class="active"' : '' ?>><a class="nav-link" href="<?= base_url('surat') ?>">Surat Perintah Kerja</a></li>
                                </ul>
                            </li>
                        <?php } ?>
                        <?php if ($this->fungsi->user_login()->level == 'pelayanan') { ?>
                            <li class="menu-header">Laporan</li>
                            <li <?= $this->uri->segment('1') == 'laporan' ? 'class="active"' : '' ?>><a class="nav-link" href="<?= base_url('laporan') ?>"><i class="far fa-file"></i> <span>Laporan Service</span></a></li>
                        <?php } ?>
                        <?php if ($this->fungsi->user_login()->level == 'pimpinan') { ?>
                            <li class="menu-header">Laporan</li>
                            <li <?= $this->uri->segment('1') == '_pimpinan' && $this->uri->segment('2') == 'laporan' ? 'class="active"' : '' ?>><a class="nav-link" href="<?= base_url('_pimpinan/laporan') ?>"><i class="far fa-file"></i> <span>Laporan Service</span></a></li>
                        <?php } ?>
                    </ul>
                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <?= $contents; ?>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2019 <div class="bullet"></div> Design By <a href="">Mohammad Yusuf Noor Habibi</a>
                </div>
                <div class="footer-right">

                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="<?= base_url() ?>assets/modules/popper.js"></script>
    <script src="<?= base_url() ?>assets/modules/tooltip.js"></script>
    <script src="<?= base_url() ?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/dataTable2/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/dataTable2/datatables.min.js"></script>
    <script src="<?= base_url() ?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="<?= base_url() ?>assets/modules/moment.min.js"></script>
    <script src="<?= base_url() ?>assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="<?= base_url() ?>assets/modules/select2/dist/js/select2.full.min.js"></script>
    <script src="<?= base_url() ?>assets/modules/jquery-selectric/jquery.selectric.min.js"></script>

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="<?= base_url() ?>assets/js/scripts.js"></script>
    <script src="<?= base_url() ?>assets/js/custom.js"></script>
    <script src="<?= base_url() ?>assets/jquery-ui/jquery-ui.js"></script>
</body>

</html>