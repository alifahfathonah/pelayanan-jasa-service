<section class="section">
    <div class="section-header">
        <h1>Barang Elektronik</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#"></a>Master Data</div>
            <div class="breadcrumb-item">Barang Elektronik</div>
        </div>
    </div>

    <div class="section-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 id="judul">Tambah Data</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>

                                    <th>ID Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Merk</th>
                                    <th>Type</th>
                                    <th>#</th>
                                </tr>
                                <tr>
                                    <form action="<?= base_url('barang/addBarang') ?>" class="form-inline" id="form" method="post">
                                        <td>
                                            <input readonly type="text" name="id" class="form-control" value="<?= $this->fungsi->kode_otomatis('id_barangelektronik', 'tb_barangelektronik', 'BRG') ?>">
                                        </td>
                                        <td>
                                            <input type="text" name="nama" class="form-control" placeholder="nama">
                                        </td>
                                        <td>
                                            <select id="id_auth" name="id_auth" class="form-control">
                                                <option value="">Pilih</option>
                                                <?php foreach ($authorized as $key) : ?>
                                                    <option value="<?= $key['id_authorized'] ?>"><?= $key['nama_authorized'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" name="type" class="form-control" placeholder="type">
                                        </td>
                                        <td>
                                            <button type="submit" id="btn-simpan" class="btn btn-outline-info btn-icon-text mb-2 mr-sm-2">Tambah</button>
                                        </td>
                                    </form>
                                </tr>
                            </table>
                        </div>
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
                                        <th>Merk</th>
                                        <th>Type</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($tampilSemua as $key) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td>
                                                <a data-toggle="modal" data-target="#ubahBarang<?= $key['id_barangelektronik'] ?>" class="btn btn-icon btn-warning" title="ubah"><i class="fas fa-edit"></i></a>
                                                <a href="<?= base_url('barang/deleteBarang/' . $key['id_barangelektronik']) ?>" onclick="return confirm('Apakah anda yakin untuk dihapus?')" title="hapus" class="btn btn btn-icon btn-danger"><i class="fas fa-trash"></i></a>
                                            </td>
                                            <td><?= $key['nama_barang'] ?></td>
                                            <td><?= $key['nama_authorized'] ?></td>
                                            <td><?= $key['type'] ?></td>
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
    <div class="modal fade" id="ubahBarang<?= $key['id_barangelektronik'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Ubah Data Barang Elektronik</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('barang/editBarang') ?>" method="post" class="pt-3">
                        <div class="form-group row">
                            <span for="nama" class="col-sm-3 col-form-label">ID Barang Elektornik</span>
                            <div class="col-sm-9">
                                <input readonly class="form-control" type="text" value="<?= $key['id_barangelektronik'] ?>" name="id" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <span for="nama" class="col-sm-3 col-form-label">Nama</span>
                            <div class="col-sm-9">
                                <input required value="<?= $key['nama_barang'] ?>" class="form-control" type="text" name="nama" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <span for="nama" class="col-sm-3 col-form-label">Merk</span>
                            <div class="col-sm-9">
                                <select id="id_auth" name="id_auth" class="form-control">
                                    <option value="">Pilih</option>
                                    <?php foreach ($authorized as $ath) : ?>
                                        <option value="<?= $ath['id_authorized'] ?>" <?= $ath['id_authorized'] == $key['id_authorized'] ? 'selected' : null ?>><?= $ath['nama_authorized'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <span for="nama" class="col-sm-3 col-form-label">Type</span>
                            <div class="col-sm-9">
                                <input required value="<?= $key['type'] ?>" class="form-control" type="text" name="type" />
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