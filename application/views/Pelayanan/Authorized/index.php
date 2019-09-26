<section class="section">
    <div class="section-header">
        <h1>Authorized</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#"></a>Master Data</div>
            <div class="breadcrumb-item">Authorized</div>
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
                        <form action="<?= base_url('authorized/addAth') ?>" class="form-inline" id="form" method="post">
                            <input type="hidden" name="id" value="<?= $this->fungsi->kode_otomatis('id_authorized', 'tb_authorized', 'ATH') ?>">
                            <input type="text" name="nama" class="form-control mb-2 mr-sm-2" id="nama" placeholder="nama authorized">
                            <div class="input-group mb-2 mr-sm-2">
                                <input type="text" name="email" class="form-control" placeholder="email">
                            </div>
                            <button type="submit" id="btn-simpan" class="btn btn-outline-info btn-icon-text mb-2 mr-sm-2">Tambah</button>
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
                                        <th>Nama</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($tampilSemua as $key) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td>
                                                <a data-toggle="modal" data-target="#ubahAth<?= $key['id_authorized'] ?>" class="btn btn-icon btn-warning" title="ubah"><i class="fas fa-edit"></i></a>
                                                <a href="<?= base_url('authorized/deleteAth/' . $key['id_authorized']) ?>" onclick="return confirm('Apakah anda yakin untuk dihapus?')" title="hapus" class="btn btn btn-icon btn-danger"><i class="fas fa-trash"></i></a>
                                            </td>
                                            <td><?= $key['nama_authorized'] ?></td>
                                            <td><?= $key['email'] == null ? 'tidak ada email' : $key['email'] ?></td>

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
    <div class="modal fade" id="ubahAth<?= $key['id_authorized'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Ubah Data Authorized</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('authorized/editAth') ?>" method="post" class="pt-3">
                        <div class="form-group row">
                            <span for="nama" class="col-sm-3 col-form-label">ID Authorized</span>
                            <div class="col-sm-9">
                                <input readonly class="form-control" type="text" value="<?= $key['id_authorized'] ?>" name="id" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <span for="nama" class="col-sm-3 col-form-label">Nama</span>
                            <div class="col-sm-9">
                                <input required value="<?= $key['nama_authorized'] ?>" class="form-control" type="text" name="nama" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <span for="nama" class="col-sm-3 col-form-label">Email</span>
                            <div class="col-sm-9">
                                <input class="form-control" value="<?= $key['email'] ?>" type="text" name="email" />
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