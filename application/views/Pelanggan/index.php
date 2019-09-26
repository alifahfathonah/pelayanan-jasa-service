<div class="row">
    <div class="col-12">
        <?php $this->view('message'); ?>
    </div>
</div>
<div class="col-12 mb-4">
    <div class="hero text-dark bg-light">
        <div class="hero-inner">
            <?php if ($this->session->userdata('id_pelanggan')) { ?>
                <h2>Selamat Datang <?= $this->fungsi->pelanggan_login()->nama_pelanggan  ?></h2>
                <p class="lead">Anda berada pada Sistem Infomasi Jasa Service pada Harco Elektronik.</p>
                <p class="lead">Silahkan melakukan keluhan.</p>
                <div class="mt-4">
                    <a href="<?= base_url('_pelanggan/keluhan') ?>" class="btn btn-outline-primary btn-lg btn-icon icon-left"><i class="far fa-user"></i> Keluhkan</a>
                </div>
            <?php } else { ?>
                <h2>Selamat Datang</h2>
                <p class="lead">Anda berada pada Sistem Infomasi Jasa Service pada Harco Elektronik. </p>
                <p class="lead">Sebelum melakukan keluhan, silahkan anda login terlebih dahulu. jika tidak punya akun silahkan mendaftar</p>
                <div class="mt-4">
                    <a href="<?= base_url('auth/register') ?>" class="btn btn-outline-primary btn-lg btn-icon icon-left"><i class="far fa-user"></i> Daftar</a>
                </div>
            <?php } ?>
        </div>
    </div>
</div>