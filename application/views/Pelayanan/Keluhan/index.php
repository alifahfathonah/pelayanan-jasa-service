<section class="section">
    <div class="section-header">
        <h1>Keluhan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#"></a>Transaksi</div>
            <div class="breadcrumb-item">Keluhan</div>
        </div>
    </div>

    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="<?= base_url('keluhan/tambah') ?>" class="btn btn-primary">Tambah Keluhan</a>
                    </div>
                    <?php $this->view('message'); ?>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="tb" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="5px">No</th>
                                        <th>Konfirmasi</th>
                                        <th width="131px">Aksi</th>
                                        <th>Pelanggan</th>
                                        <th>Keluhan</th>
                                        <th class="text-center">Barang</th>
                                        <th class="text-center">Merk</th>
                                        <th class="text-center">Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;

                                    foreach ($keluhan as $key) : ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td class="text-center">
                                                <?php if ($key['konfirmasi'] == "sudah") : ?>
                                                    <div class="badge badge-pill badge-success mb-1">Terkonfirmasi</div>
                                                <?php elseif ($key['konfirmasi'] == "belum") : ?>
                                                    <button data-toggle='modal' data-target="#konfirmasi<?= $key['id_keluhan'] ?>" class="btn btn-outline-primary"><i class="fas fa-check"></i></button>
                                                <?php else : ?>
                                                    <div class="badge badge-pill badge-danger mb-1">Ditolak</div>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if ($key['nama_authorized'] == 'Sanken' || $key['nama_authorized'] == 'Daikin') : ?>
                                                    <a title="Kirim Data ke Authorized" class="btn btn-icon btn-info <?= $key['status'] == '1' || $key['konfirmasi'] == 'belum' || $key['konfirmasi'] == 'tolak' || $key['status'] == '2' ? 'disabled' : null ?>" data-toggle='modal' data-target='#kirim' data-href='<?= base_url('keluhan/kirim/' . $key['id_keluhan']) ?>'><i class="fas fa-paper-plane"></i></a>
                                                <?php endif; ?>

                                                <a id="buatSurat" href="<?= base_url('surat/buat/' . $key['id_keluhan']) ?>" class="btn btn-icon btn-success <?= $key['konfirmasi'] == 'belum' || $key['konfirmasi'] == 'tolak' || $key['status'] == '0' || $key['status'] == '2' ? 'disabled' : null ?>" title="Buat SPK"><i class="fas fa-edit" aria-hidden="true"></i></a>

                                            </td>
                                            <td><?= $key['nama_pelanggan'] ?></td>
                                            <td><?= $key['keluhan'] ?></td>
                                            <td class="text-center"><?= $key['nama_barang'] . " - " . $key['type'] ?></td>
                                            <td class="text-center"><?= $key['nama_authorized'] ?></td>
                                            <td><?= tgl_indo($key['tgl_keluhan']) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- kirim ke authorized -->
<div class="modal fade" id="kirim" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <b>Anda yakin ingin mengirim data ini ?</b>
                <br><br>
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-close"></i> Batal</button>
                <a class="btn btn-primary btn-ok"> Kirim</a>
            </div>
        </div>
    </div>
</div>

<!-- konfirmasi -->
<?php foreach ($keluhan as $k) : ?>
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