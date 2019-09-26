<section class="section">
    <div class="section-header">
        <h1>Pembayaran</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#"></a>Transaksi</div>
            <div class="breadcrumb-item">Pembayaran</div>
        </div>
    </div>
    <div class="section-body">
        <h2 class="section-title">
            Belum Dibayar
        </h2>

        <div class="row">
            <?php foreach ($bayar as $key) : ?>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Surat Perintah Kerja</h4>
                            <!-- <a style="margin-left: 225px" class="btn btn-warning" href="<?= base_url('_teknisi/surat/tampilPerID/' . $key['id_surat']) ?>">Detail</a> -->
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled list-unstyled-border list-unstyled-noborder">
                                <li class="media">
                                    <img alt="image" class="mr-3 rounded-circle" width="50" src="<?= base_url('assets/img/pelanggan/' . $key['foto']) ?>">
                                    <div class="media-body">
                                        <div class="media-right">
                                            <?php if ($key['status_bayar'] == "belum") { ?>
                                                <div class="text-danger">Belum Bayar</div>
                                            <?php } else { ?>
                                                <div class="text-success">Sudah Bayar</div>
                                            <?php } ?>
                                        </div>
                                        <div class="media-title mb-1"><?= $key['nama_pelanggan'] ?></div>
                                        <div class="text-time"><?= waktu_lalu($key['tgl']) ?></div>
                                        <div class="media-description text-muted">
                                            <table>
                                                <tr>
                                                    <td>Nomor Perbaikan</td>
                                                    <td>:</td>
                                                    <td><?= $key['nomor_perbaikan'] == "0" ? '-' : $key['nomor_perbaikan'] ?></td>
                                                </tr>
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
                                        <form method="get">
                                            <a href="<?= base_url('_teknisi/pembayaran/bayar/' . $key['id_surat']) ?>" class="btn btn-success float-right mt-2">Bayar</a>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <h2 class="section-title">
            Sudah Dibayar
        </h2>

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Pembayaran</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tb" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Aksi</th>
                                    <th>ID Surat</th>
                                    <th>Nomor Perbaikan</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Status Service</th>
                                    <th>Status Bayar</th>
                                    <th>Total Bayar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($belum_bayar as $by) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><a title="detail" href="<?= base_url('_teknisi/surat/detail/') . $by['id_surat'] ?>" class="btn btn-info"><i class="fa fa-eye"></i></a></td>
                                        <td><?= $by['id_surat'] ?></td>
                                        <td><?= $by['nomor_perbaikan'] == 'tidak' ? ' - ' : $by['nomor_perbaikan'] ?></td>
                                        <td><?= $by['nama_pelanggan'] ?></td>
                                        <td><?= $by['status_service'] == "selesai" ? "Selesai Service" : '' ?></td>
                                        <td><?= $by['status_bayar'] == "sudah" ? "Sudah Bayar" : '' ?></td>
                                        <td>Rp. <?= number_format($by['total_bayar'], 2, ",", ".") ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
    $(document).ready(function() { //event pada saat document telah selesai loadingnya
        cekTeknisi();
    })
</script>