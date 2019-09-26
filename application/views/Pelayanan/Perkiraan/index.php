<section class="section">
    <div class="section-header">
        <h1>Perkiraan Biaya</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#"></a>Master Data</div>
            <div class="breadcrumb-item">Perkiraan Biaya</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <button type="button" data-toggle="modal" data-target="#tambahPB" class="btn btn-outline-primary btn-icon-text ml-2">
                            <i class="fas fa-user-plus"></i>
                            Tambah Data
                        </button>
                    </div>
                    <?php $this->view('message'); ?>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="tb" class="table table-striped table-hover table-borderless">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Aksi</th>
                                        <th>Nomor Perbaikan</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($tampilSemua as $key) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td>
                                                <a data-toggle="modal" data-target="#ubahPB<?= $key['id_perkiraan'] ?>" class="btn btn-icon btn-warning" title="ubah"><i class="fas fa-edit"></i></a>
                                                <a href="<?= base_url('perkiraan/deletePB/' . $key['id_perkiraan']) ?>" onclick="return confirm('Apakah anda yakin untuk dihapus?')" title="hapus" class="btn btn btn-icon btn-danger"><i class="fas fa-trash"></i></a>
                                            </td>
                                            <td><?= $key['keterangan'] ?></td>
                                            <td>
                                                Rp. <?= number_format($key['harga'], 2, ",", ".") ?>
                                            </td>
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

<!-- Modal -->
<div class="modal fade" id="tambahPB" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Tambah Data Perkiraan Biaya</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('perkiraan/addPB') ?>" method="post" class="pt-3">
                    <div class="form-group row">
                        <span for="nama" class="col-sm-3 col-form-label">Kerusakan dan Perawatan</span>
                        <div class="col-sm-9">
                            <textarea name="ket" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <span for="nama" class="col-sm-3 col-form-label">Harga</span>
                        <div class="col-sm-9">
                            <input required class="form-control" type="text" name="harga" />
                        </div>
                    </div>
                    <div style="float: right">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <input type="submit" class="btn btn-primary" value="Simpan">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php foreach ($tampilSemua as $key) : ?>
    <div class="modal fade" id="ubahPB<?= $key['id_perkiraan'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Ubah Data Perkiraan Biaya</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('perkiraan/editPB') ?>" method="post" class="pt-3">
                        <div class="form-group row">
                            <span for="nama" class="col-sm-3 col-form-label">Kerusakan dan Perawatan</span>
                            <div class="col-sm-9">
                                <input type="hidden" name="id" value="<?= $key['id_perkiraan'] ?>">
                                <textarea name="ket" class="form-control" cols="30" rows="10"><?= $key['keterangan'] ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <span for="nama" class="col-sm-3 col-form-label">Harga</span>
                            <div class="col-sm-9">
                                <input required class="form-control" value="<?= $key['harga'] ?>" type="text" name="harga" />
                            </div>
                        </div>
                        <div style="float: right">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <input type="submit" class="btn btn-primary" value="Ubah">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>