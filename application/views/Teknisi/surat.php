<section class="section">
    <div class="section-header">
        <h1>Surat Perintah Kerja</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="<?= base_url('_teknisi/beranda') ?>">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#"></a>Transaksi</div>
            <div class="breadcrumb-item">Surat Perintah Kerja</div>
        </div>
    </div>

    <?php $status = ['belum', 'otw', 'setengah'];
    foreach ($status as $detail) :
        ?>
        <div class="section-body">
            <h2 class="section-title">
                <?= $detail == "belum" ? "Surat Perintah Kerja Baru" : ($detail == "otw" ? "Sedang Perjalanan" : "Belum Selesai Service") ?>
            </h2>

            <div class="row">
                <?php
                $user = $this->fungsi->user_login()->id_user;
                $query = "SELECT a.id_surat, a.status_service, a.status_bayar, a.id_user, a.total_bayar, a.ket_status, a.tgl, b.keluhan, b.seri_barang, c.id_nomor, c.nomor_perbaikan, b.garansi, d.nama, f.nama_pelanggan, f.no_telp, f.alamat, f.pelanggan_lat, f.pelanggan_long, f.foto, g.nama_barang, g.type, h.nama_authorized, i.info, i.keterangan, i.updated_info FROM tb_suratperintahkerja a INNER JOIN tb_keluhan b ON a.id_keluhan=b.id_keluhan INNER JOIN tb_nomorperbaikan c ON a.id_nomor=c.id_nomor INNER JOIN tb_user d ON a.id_user=d.id_user INNER JOIN tb_pendaftaran f ON b.id_pelanggan=f.id_pelanggan INNER JOIN tb_barangelektronik g ON b.id_barangelektronik=g.id_barangelektronik INNER JOIN tb_authorized h ON g.id_authorized=h.id_authorized INNER JOIN tb_info i ON i.id_surat=a.id_surat WHERE status_service='$detail' AND a.id_user='$user' ORDER BY a.id_surat ASC";
                $spk = $this->db->query($query)->result_array();
                $cek = $this->db->query($query)->num_rows();
                foreach ($spk as $key) : ?>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Surat Perintah Kerja</h4>
                                <a title="lokasi" href="<?= base_url('_teknisi/surat/lokasi/' . $key['id_surat']) ?>" style="margin-left: 250px; margin-top:10px" class="btn btn-primary mr-1"><i class="fas  fa-map-marker-alt"></i></a>
                                <a class="btn btn-warning float-right mt-2" href="<?= base_url('_teknisi/surat/tampilPerID/' . $key['id_surat']) ?>">Detail</a>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled list-unstyled-border list-unstyled-noborder">
                                    <li class="media">
                                        <img alt="image" class="mr-3 rounded-circle" width="50" src="<?= base_url('assets/img/pelanggan/' . $key['foto']) ?>">
                                        <div class="media-body">
                                            <div class="media-right">
                                                <?php if ($key['status_service'] == "belum") { ?>
                                                    <div class="text-danger">Belum Diservice</div>
                                                <?php } else if ($key['status_service'] == "otw") { ?>
                                                    <div class="text-info">Sedang Perjalanan</div>
                                                <?php } else if ($key['status_service'] == "setengah") { ?>
                                                    <div class="text-primary">Belum Selesai diservice</div>
                                                <?php } else { ?>
                                                    <div class="text-success">Selesai Diservice</div>
                                                <?php } ?>
                                            </div>
                                            <div class="media-title mb-1"><?= $key['nama_pelanggan'] ?></div>
                                            <div class="text-time"><?= waktu_lalu($key['tgl']) ?></div>
                                            <div class="media-description text-muted">
                                                <table>
                                                    <tr>
                                                        <td>Nomor Perbaikan</td>
                                                        <td>:</td>
                                                        <td><?= $key['id_nomor'] == "8" ? '-' : $key['nomor_perbaikan'] ?></td>
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
                                                        <td>Keluhan</td>
                                                        <td>:</td>
                                                        <td><?= $key['keluhan'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Alamat</td>
                                                        <td>:</td>
                                                        <td><?= $key['alamat'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garansi</td>
                                                        <td>:</td>
                                                        <td><?= $key['garansi'] == 'ya' ? 'Ya' : 'Tidak' ?></td>
                                                    </tr>
                                                    <?php if ($key['status_service'] == "setengah") { ?>
                                                        <tr>
                                                            <td>Keterangan</td>
                                                            <td>:</td>
                                                            <td><?= $key['ket_status'] ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                    <tr>
                                                        <td><b>Jadwal Service</b></td>
                                                        <td>:</td>
                                                        <td><b><?= tgl_indo($key['info']) . " - " . $key['keterangan'] ?></b></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <form method="get">
                                                <?php if ($key['status_service'] == "belum") { ?>
                                                    <button id="belum" type="submit" data-id="<?= $key['id_surat'] ?>" class="btn btn-primary float-right mt-2 ml-2">Perjalanan</button>
                                                <?php } else if ($key['status_service'] == "otw") { ?>
                                                    <a data-toggle="modal" data-target="#belumselesai<?= $key['id_surat'] ?>" class="btn btn-info float-right mt-2 ml-2 text-white">Belum Selesai</a>
                                                    <button id="selesai" data-id="<?= $key['id_surat'] ?>" class="btn btn-success float-right mt-2">Selesai</button>
                                                <?php } else if ($key['status_service'] == "setengah") { ?>
                                                    <a data-toggle="modal" data-target="#info<?= $key['id_surat'] ?>" class="btn btn-warning float-right mt-2 ml-2 text-white <?= $key['updated_info'] != "" ? "disabled" : "" ?>">Info</a>
                                                    <button id="selesai2" data-id="<?= $key['id_surat'] ?>" class="btn btn-primary float-right mt-2">Selesai</button>
                                                <?php } else { ?>
                                                <?php } ?>
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endforeach; ?>
</section>

<?php foreach ($datap as $spk) : ?>
    <div class="modal fade" id="belumselesai<?= $spk['id_surat'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Keterangan Belum Selesai</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('_teknisi/surat/ubahSetengah') ?>" method="post" class="pt-3">
                        <div class="form-group row">
                            <span for="nama" class="col-sm-3 col-form-label">No. Surat Perintah Kerja</span>
                            <div class="col-sm-9">
                                <input readonly class="form-control" type="text" value="<?= $spk['id_surat'] ?>" name="id" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <span for="nama" class="col-sm-3 col-form-label">Keterangan</span>
                            <div class="col-sm-9">
                                <textarea name="ket" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div style="float: right">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <input type="submit" class="btn btn-primary" value="Simpan">
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php endforeach; ?>

<?php foreach ($datap as $spk) : ?>
    <div class="modal fade" id="info<?= $spk['id_surat'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Info Jadwal Terbaru</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('_teknisi/surat/info') ?>" method="post" class="pt-3">
                        <div class="form-group row">
                            <span for="nama" class="col-sm-3 col-form-label">No. Surat Perintah Kerja</span>
                            <div class="col-sm-9">
                                <input readonly class="form-control" type="text" value="<?= $spk['id_surat'] ?>" name="id" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <span for="nama" class="col-sm-3 col-form-label">Info</span>
                            <div class="col-sm-9">
                                <input type="date" name="info" class="form-control" id="">
                            </div>
                        </div>
                        <div style="float: right">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <input type="submit" class="btn btn-primary" value="Simpan">
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php endforeach; ?>

<script>
    $(document).ready(function() { //event pada saat document telah selesai loadingnya
        cekTeknisi();
    })
</script>