<section class="section">
    <div class="section-header">
        <h1>Nomor Perbaikan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#"></a>Master Data</div>
            <div class="breadcrumb-item">Nomor Perbaikan</div>
        </div>
    </div>

    <div class="section-body">

        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <h4 id="judul">Tambah Data</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('nomor/addNomor') ?>" class="form-inline" id="form_nomor" method="post">
                            <input type="text" name="nomor" class="form-control mb-2 mr-sm-2" id="nama" placeholder="nomor perbaikan">
                            <button type="submit" class="btn btn-outline-info btn-icon-text mb-2 mr-sm-2">Tambah</button>
                        </form>
                        <div style="font-size: smaller;" id='eror' class="text-danger"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">

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
                                                <a data-toggle="modal" data-target="#ubahNomor<?= $key['id_nomor'] ?>" class="btn btn-icon btn-warning" title="ubah"><i class="fas fa-edit"></i></a>
                                                <a href="<?= base_url('nomor/deleteNomor/' . $key['id_nomor']) ?>" onclick="return confirm('Apakah anda yakin untuk dihapus?')" title="hapus" class="btn btn btn-icon btn-danger"><i class="fas fa-trash"></i></a>
                                            </td>
                                            <td><?= $key['nomor_perbaikan'] ?></td>
                                            <td>
                                                <?= $key['status'] == 'belum' ? 'Belum Terpakai' : 'Sudah Terpakai' ?>
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

<?php foreach ($tampilSemua as $key) : ?>
    <div class="modal fade" id="ubahNomor<?= $key['id_nomor'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Ubah Data Nomor</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('nomor/editNomor') ?>" method="post" class="pt-3">
                        <div class="form-group row">
                            <span for="nama" class="col-sm-3 col-form-label">Nomor Perbaikan</span>
                            <div class="col-sm-9">
                                <input readonly class="form-control" type="hidden" value="<?= $key['id_nomor'] ?>" name="id" />
                                <input required value="<?= $key['nomor_perbaikan'] ?>" class="form-control" type="text" name="nomor" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <span for="nama" class="col-sm-3 col-form-label">Nomor Perbaikan</span>
                            <div class="col-sm-9">
                                <select class="form-control" name="status" id="">
                                    <option value="belum" <?= $key['status'] == 'belum' ? 'selected' : null ?>>Belum Terpakai</option>
                                    <option value="dipake">Sudah Terpakai</option>
                                </select>
                            </div>
                        </div>
                        <div style="float: right">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <input type="submit" class="btn btn-primary" value="Ubah">
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php endforeach; ?>