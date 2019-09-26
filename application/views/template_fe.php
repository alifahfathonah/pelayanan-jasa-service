<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Harco Elektronik</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/modules/fontawesome/css/all.min.css">
    <link href="<?= base_url() ?>assets/dataTable2/datatables.min.css" rel="stylesheet" />

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/jquery-ui/jquery-ui.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/modules/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/modules/jquery-selectric/selectric.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/modules/izitoast/css/iziToast.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/mystyle.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/components.css">
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyB4o-DeKb-TUieFYekF9XZHOKTL3tm4aWI&libraries=geometry"></script>
    <!-- <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script> -->
    <style>
        #ikon {
            position: relative
        }

        .jumlahpel {
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

        #map {
            width: 600px;
            height: 350px;
        }

        #tabs {
            background: #007b5e;
            color: #eee;
        }

        #tabs h6.section-title {
            color: #eee;
        }

        #tabs .nav-tabs .nav-item.show .nav-link,
        .nav-tabs .nav-link.active {
            color: blue;
            background-color: transparent;
            border-color: transparent transparent #f3f3f3;
            border-bottom: 4px solid !important;
            font-size: 20px;
            font-weight: bold;
        }

        #tabs .nav-tabs .nav-link {
            border: 1px solid transparent;
            border-top-left-radius: .25rem;
            border-top-right-radius: .25rem;
            color: #eee;
            font-size: 20px;
        }
    </style>

    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
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
    <script src="<?= base_url('assets/js/notif-pelanggan.js') ?>"></script>
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
                    <?php if ($this->session->userdata('id_pelanggan')) { ?>
                        <li class="dropdown dropdown-list-toggle"><a id="tombol_notif" href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg"><i id="ikon" class="far fa-bell"><span class="jumlahpel"></span></i></a>
                            <div class="dropdown-menu dropdown-list dropdown-menu-right">
                                <div class="infoNotif">
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <button title="refresh" onclick="window.location.reload(true)" class="btn btn-primary btn-sm mr-1"><i class="fas fa-sync"></i></button>
                            <?php if ($this->session->userdata('id_pelanggan')) { ?>

                                <img alt="image" src="<?= base_url('assets/img/pelanggan/') . $this->fungsi->pelanggan_login()->foto ?>" class="rounded-circle mr-1">
                                <div class="d-sm-none d-lg-inline-block"><?= 'Hi, ' . $this->fungsi->pelanggan_login()->nama_pelanggan ?></div>
                            <?php } else { ?>
                                <button data-toggle="modal" data-target="#modal-5" class="btn btn-warning">Login</button>
                            <?php } ?>
                        </a>
                        <?php if ($this->session->userdata('id_pelanggan')) { ?>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-title">Logged in 5 min ago</div>
                                <a href="<?= base_url('_pelanggan/profile') ?>" class="dropdown-item has-icon">
                                    <i class="far fa-user"></i> Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="<?= base_url('auth/pelanggan_logout') ?>" class="dropdown-item has-icon text-danger">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </a>
                            </div>
                        <?php } ?>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="index.html">Harco Elektronik</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="index.html">St</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Dashboard</li>
                        <li <?= $this->uri->segment(2) == "beranda" ? 'class="active"' : '' ?>><a class="nav-link" href="<?= base_url('_pelanggan/beranda') ?>"><i class="fas fa-fire"></i> <span>Beranda</span></a></li>
                        <li class="menu-header">Profile</li>
                        <li <?= $this->uri->segment(2) == "profile" &&  $this->uri->segment(3) == "" ? 'class="active"' : '' ?>><a class="nav-link" href="<?= base_url('_pelanggan/profile') ?>">
                                <i class="fas fa-user"></i> <span>Profile Saya</span></a>
                        </li>
                        <?php if ($this->session->userdata('id_pelanggan')) { ?>
                            <li <?= $this->uri->segment(2) == "profile" &&  $this->uri->segment(3) == "edit" ? 'class="active"' : '' ?>><a class="nav-link" href="<?= base_url('_pelanggan/profile/edit') ?>">
                                    <i class="fas fa-user-edit"></i> <span>Ubah Profile</span></a>
                            </li>
                            <script>
                                cekPelanggan()
                            </script>
                        <?php } ?>
                        <li class="menu-header">Service</li>
                        <!-- <li <?= $this->uri->segment(2) == "keluhan" &&  $this->uri->segment(3) == "biaya" ? 'class="active"' : '' ?>><a class="nav-link" href="<?= base_url('_pelanggan/keluhan/biaya') ?>">
                                <i class="fas fa-money-bill-wave"></i> <span>Biaya Service</span></a>
                        </li> -->
                        <?php if ($this->session->userdata('id_pelanggan')) { ?>
                            <li <?= $this->uri->segment(2) == "keluhan" &&  $this->uri->segment(3) == "" ? 'class="active"' : '' ?>><a class="nav-link" href="<?= base_url('_pelanggan/keluhan') ?>">
                                    <i class="fas fa-cogs"></i> <span>Keluhan</span></a>
                            </li>
                        <?php } ?>
                        <li <?= $this->uri->segment(2) == "keluhan" &&  $this->uri->segment(3) == "riwayat" ? 'class="active"' : '' ?>><a class="nav-link" href="<?= base_url('_pelanggan/keluhan/riwayat') ?>">
                                <i class="fas fa-history"></i> <span>Riwayat</span></a>
                        </li>
                    </ul>
                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <?= $contents; ?>
            </div>

            <div class="modal fade" id="modal-5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="<?= base_url('auth/login_pelanggan') ?>">
                                <div class="form-group">
                                    <label>Username</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-user"></i>
                                            </div>
                                        </div>
                                        <input type="text" required class="form-control" placeholder="Username" name="user">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-lock"></i>
                                            </div>
                                        </div>
                                        <input type="password" required class="form-control" placeholder="Password" name="password">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <p>Belum punya akun? <a href="<?= base_url('auth/register') ?>">Daftar</a></p>
                                    </div>

                                    <div class="col-offset-5">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                        <input type="submit" class="btn btn-primary" value="Login">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2019 <div class="bullet"></div> Build By <a href="">Mohammad Yusuf Noor Habibi</a>
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
    <script src="<?= base_url() ?>assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js"></script>
    <script src="<?= base_url() ?>assets/modules/izitoast/js/iziToast.min.js"></script>


    <!-- Page Specific JS File -->
    <!-- <script src="<?= base_url() ?>assets/js/page/features-post-create.js"></script> -->

    <!-- Template JS File -->
    <script src="<?= base_url() ?>assets/js/scripts.js"></script>
    <script src="<?= base_url() ?>assets/js/custom.js"></script>
    <script src="<?= base_url() ?>assets/jquery-ui/jquery-ui.js"></script>
</body>

</html>