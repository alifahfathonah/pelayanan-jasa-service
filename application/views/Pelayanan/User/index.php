<section class="section">
    <div class="section-header">
        <h1>User</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#"></a>Master Data</div>
            <div class="breadcrumb-item">User</div>
        </div>
    </div>

    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <button type="button" data-toggle="modal" data-target="#tambahUser" class="btn btn-outline-primary btn-icon-text ml-2">
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
                                        <th>Nama</th>
                                        <th>No Telp</th>
                                        <th>Username</th>
                                        <th>Level</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($tampilSemua as $key) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td>
                                                <a data-toggle="modal" data-target="#ubahUser<?= $key['id_user'] ?>" class="btn btn-icon btn-warning" title="Edit"><i class="fas fa-edit"></i></a>
                                                <a href="<?= base_url('pelayanan/deleteUser/' . $key['id_user']) ?>" onclick="return confirm('Apakah anda yakin untuk dihapus?')" title="hapus" class="btn btn btn-icon btn-danger"><i class="fas fa-trash"></i></a>
                                            </td>
                                            <td><?= $key['nama'] ?></td>
                                            <td><?= $key['no_telp'] ?></td>
                                            <td><?= $key['username'] ?></td>
                                            <td>
                                                <?php if ($key['level'] == 'pelayanan') : ?>
                                                    <div class="badge badge-pill badge-info mb-1">Pelayanan</div>
                                                <?php elseif ($key['level'] == 'teknisi') : ?>
                                                    <div class="badge badge-pill badge-success mb-1">Teknisi</div>
                                                <?php else : ?>
                                                    <div class="badge badge-pill badge-primary mb-1">Pimpinan</div>
                                                <?php endif; ?>
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
<div class="modal fade" id="tambahUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Tambah Data User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('pelayanan/addUser') ?>" method="post" class="pt-3">
                    <div class="form-group row">
                        <span for="nama" class="col-sm-3 col-form-label">ID User</span>
                        <div class="col-sm-9">
                            <input readonly class="form-control" type="text" value="<?= $this->fungsi->kode_otomatis('id_user', 'tb_user', 'USR') ?>" name="id" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <span for="nama" class="col-sm-3 col-form-label">Nama</span>
                        <div class="col-sm-9">
                            <input required class="form-control" type="text" name="nama" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <span for="nama" class="col-sm-3 col-form-label">No HP</span>
                        <div class="col-sm-9">
                            <input required class="form-control" type="text" name="no" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <span for="nama" class="col-sm-3 col-form-label">Username</span>
                        <div class="col-sm-9">
                            <input required class="form-control" type="text" name="username" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <span for="nama" class="col-sm-3 col-form-label">Password</span>
                        <div class="col-sm-9">
                            <input type="password" required class="form-control" name="password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <span for="nama" class="col-sm-3 col-form-label">Level</span>
                        <div class="col-sm-9">
                            <select class="form-control selectric" name="level">
                                <option value="">-- Pilih --</option>
                                <option value="pelayanan">Pelayanan</option>
                                <option value="teknisi">Teknisi</option>
                                <option value="pimpinan">Pimpinan</option>
                            </select>
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
    <div class="modal fade" id="ubahUser<?= $key['id_user'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Ubah Data User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('pelayanan/editUser') ?>" method="post" class="pt-3">
                        <div class="form-group row">
                            <span for="nama" class="col-sm-3 col-form-label">ID User</span>
                            <div class="col-sm-9">
                                <input readonly class="form-control" type="text" value="<?= $key['id_user'] ?>" name="id" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <span for="nama" class="col-sm-3 col-form-label">Nama</span>
                            <div class="col-sm-9">
                                <input required value="<?= $key['nama'] ?>" class="form-control" type="text" name="nama" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <span for="nama" class="col-sm-3 col-form-label">No HP</span>
                            <div class="col-sm-9">
                                <input required class="form-control" value="<?= $key['no_telp'] ?>" type="text" name="no" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <span for="nama" class="col-sm-3 col-form-label">Username</span>
                            <div class="col-sm-9">
                                <input required class="form-control" value="<?= $key['username'] ?>" type="text" name="username" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <span for="nama" class="col-sm-3 col-form-label">Password</span>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="password">
                                <div style="font-size: smaller;" class="text-danger">*birakan kosong jika tidak diganti</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <span for="nama" class="col-sm-3 col-form-label">Level</span>
                            <div class="col-sm-9">
                                <select class="form-control selectric" name="level">
                                    <option value="pelayanan">Pelayanan</option>
                                    <option value="teknisi" <?= $key['level'] == "teknisi" ? 'selected' : null ?>>Teknisi</option>
                                    <option value="pimpinan" <?= $key['level'] == "pimpinan" ? 'selected' : null ?>>Pimpinan</option>
                                </select>
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