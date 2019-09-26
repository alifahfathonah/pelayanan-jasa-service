<section class="section">
    <div class="section-header">
        <h1>Keluhan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#"></a>Master Data</div>
            <div class="breadcrumb-item">Keluhan</div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-sm-12 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4>Keluhan Terbaru</h4>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled list-unstyled-border list-unstyled-noborder">
                        <li class="media">
                            <img alt="image" class="mr-3 rounded-circle" width="70" src="<?= base_url('assets/img/pelanggan/') . $keluhan['foto'] ?>">
                            <div class="media-body">
                                <div class="media-right">
                                    <div class="text-primary"><?= $keluhan['no_telp'] ?></div>
                                </div>
                                <div class="media-title mb-1"><?= $keluhan['nama_pelanggan'] ?></div>
                                <div class="text-time"><?= waktu_lalu($keluhan['tgl_keluhan']) ?></div>
                                <div class="media-description text-muted">
                                    <table>
                                        <tr>
                                            <td>Barang Elektronik</td>
                                            <td>:</td>
                                            <td><?= $keluhan['nama_barang'] . " " . $keluhan['type'] . " - " . $keluhan['nama_authorized'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Seri Barang</td>
                                            <td>:</td>
                                            <td><?= $keluhan['seri_barang'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Keluhan</td>
                                            <td>:</td>
                                            <td><?= $keluhan['keluhan'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>:</td>
                                            <td><?= $keluhan['alamat'] ?></td>
                                        </tr>
                                    </table>
                                </div>
                                <?php if ($keluhan['konfirmasi'] == 'belum') { ?>
                                    <button data-toggle='modal' data-target="#konfirmasi<?= $keluhan['id_keluhan'] ?>" class="btn btn-outline-primary float-right">Konfirmasi</button>
                                <?php } ?>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- konfirmasi -->
<?php foreach ($semua as $k) : ?>
    <div class="modal fade" id="konfirmasi<?= $k['id_keluhan'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Konfirmasi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('keluhan/konfirmasi') ?>" method="post" class="pt-3">
                        <div class="form-group row">
                            <span for="nama" class="col-sm-3 col-form-label">ID Keluhan</span>
                            <div class="col-sm-9">
                                <input type="hidden" name="merk" value="<?= $k['nama_authorized'] ?>">
                                <input readonly class="form-control" type="text" value="<?= $k['id_keluhan'] ?>" name="id" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <span for="nama" class="col-sm-3 col-form-label">Konfirmasi</span>
                            <div class="col-sm-9">
                                <select id="konfirm" required name="konfirmasi" class="form-control selectric">
                                    <option value="">Pilih</option>
                                    <option value="tolak">Tolak Konfirmasi</option>
                                    <option value="sudah">Konfirmasi</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <span for="nama" class="col-sm-3 col-form-label">Keterangan</span>
                            <div class="col-sm-9">
                                <textarea name="ket" id="ket_konfirmasi" class="form-control" cols="30" rows="8"></textarea>
                                <div style="font-size: smaller;" class="text-danger">*biarkan kosong jika Dikonfirmasi</div>
                            </div>
                        </div>

                        <div style="float: right">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close"></i> Batal</button>
                            <button type="submit" class="btn btn-info btn-ok"> Konfirmasi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>