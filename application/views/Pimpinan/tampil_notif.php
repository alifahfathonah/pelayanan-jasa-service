<section class="section">
    <div class="section-header">
        <h1>Surat Perintah Kerja</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= base_url('_teknisi/beranda') ?>">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#"></a>Transaksi</div>
            <div class="breadcrumb-item">Surat Perintah Kerja</div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <h4>Surat Perintah Kerja</h4>
                    <a style="margin-left: 138px" class="btn btn-warning float-right mt-2" href="<?= base_url('_teknisi/surat/tampilPerID/' . $key['id_surat']) ?>">Detail</a>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled list-unstyled-border list-unstyled-noborder">
                        <li class="media">
                            <img alt="image" class="mr-3 rounded-circle" width="50" src="<?= base_url('assets/img/pelanggan/' . $key['foto']) ?>">
                            <div class="media-body">
                                <div class="media-right">
                                    <div class="text-danger">Belum Diservice</div>
                                </div>
                                <div class="media-title mb-1"><?= $key['nama_pelanggan'] ?></div>
                                <div class="text-time"><?= waktu_lalu($key['tgl']) ?></div>
                                <div class="media-description text-muted">
                                    <table>
                                        <!-- <tr>
                                            <td>Nomor Perbaikan</td>
                                            <td>:</td>
                                            <td><?= $key['nomor_perbaikan'] == "null" ? '-' : $key['nomor_perbaikan'] ?></td>
                                        </tr> -->
                                        <tr>
                                            <td>Barang Elektronik</td>
                                            <td>:</td>
                                            <td><?= $key['nama_barang'] . " " . $key['type'] . " - " . $key['nama_authorized'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Seri Barang</td>
                                            <td>:</td>
                                            <td><?= $key['seri_barang'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>keluhan</td>
                                            <td>:</td>
                                            <td><?= $key['keluhan'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>:</td>
                                            <td><?= $key['alamat'] ?></td>
                                        </tr>
                                    </table>
                                </div>
                                <form method="post" action="<?= base_url('_pimpinan/surat/ttd') ?>">
                                    <input name="id" type="hidden" value="<?= $key['id_surat'] ?>">
                                    <button type="submit" class="btn btn-primary float-right mt-2 ml-2">Tanda Tangani</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>