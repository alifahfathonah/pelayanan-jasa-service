<section class="section">
    <div class="section-header">
        <h1>Sparepart</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#"></a>Master Data</div>
            <div class="breadcrumb-item">Sparepart</div>
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
                                    <th>Nama Sparepart</th>
                                    <th>Merk</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>#</th>
                                </tr>
                                <tr>
                                    <form action="<?= base_url('sparepart/addSparepart') ?>" class="form-inline" method="post">
                                        <td>
                                            <input readonly type="text" name="id" class="form-control" value="<?= $this->fungsi->kode_otomatis('id_sparepart', 'tb_sparepart', 'SPR') ?>">
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
                                            <input type="text" name="harga" class="form-control" placeholder="harga">
                                        </td>
                                        <td>
                                            <input type="text" name="stok" class="form-control" placeholder="stok">
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-outline-info btn-icon-text mb-2 mr-sm-2">Tambah</button>
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
                                        <th>Harga</th>
                                        <th>Stok</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($tampilSemua as $key) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td>
                                                <a data-toggle="modal" data-target="#ubahSparepart<?= $key['id_sparepart'] ?>" class="btn btn-icon btn-warning" title="ubah"><i class="fas fa-edit"></i></a>
                                                <a href="<?= base_url('sparepart/deleteSparepart/' . $key['id_sparepart']) ?>" onclick="return confirm('Apakah anda yakin untuk dihapus?')" title="hapus" class="btn btn btn-icon btn-danger"><i class="fas fa-trash"></i></a>
                                                <a data-toggle="modal" data-target="#pasokStok<?= $key['id_sparepart'] ?>" class="btn btn-icon btn-light" title="pasok"><i class="fas fa-cart-plus"></i></a>
                                            </td>
                                            <td><?= $key['nama_sparepart'] ?></td>
                                            <td><?= $key['nama_authorized'] ?></td>
                                            <td>Rp. <?= number_format($key['harga'], 2, ", ", ".") ?></td>
                                            <td><?= $key['stok'] ?></td>

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

<!-- pasok stok -->
<?php foreach ($tampilSemua as $key) : ?>
    <div class="modal fade" id="pasokStok<?= $key['id_sparepart'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Pasok Stok</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('sparepart/pasokStok') ?>" method="post" class="pt-3">
                        <div class="form-group row">
                            <span for="nama" class="col-sm-3 col-form-label">ID Pasok</span>
                            <div class="col-sm-9">
                                <input readonly class="form-control" type="text" value="<?= $this->fungsi->kode_otomatis('id_pasok', 'tb_pasok', 'PSK') ?>" name="id" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <span for="nama" class="col-sm-3 col-form-label">Nama</span>
                            <div class="col-sm-9">
                                <input type="hidden" name="id_spar" value="<?= $key['id_sparepart'] ?>">
                                <input required readonly value="<?= $key['nama_sparepart'] ?>" class="form-control" type="text" name="nama" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <span for="nama" class="col-sm-3 col-form-label">Merk</span>
                            <div class="col-sm-9">
                                <input type="text" readonly class="form-control" name="merk" value="<?= $key['nama_authorized'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <span for="nama" class="col-sm-3 col-form-label">Jumlah</span>
                            <div class="col-sm-9">
                                <input required class="form-control" type="text" name="jml" />
                            </div>
                        </div>
                        <div style="float: right">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <input type="submit" class="btn btn-primary" value="Pasok">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- ubah sparepart -->
<?php foreach ($tampilSemua as $key) : ?>
    <div class="modal fade" id="ubahSparepart<?= $key['id_sparepart'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Ubah Data Sparepart</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('sparepart/editSparepart') ?>" method="post" class="pt-3">
                        <div class="form-group row">
                            <span for="nama" class="col-sm-3 col-form-label">ID Sparepart</span>
                            <div class="col-sm-9">
                                <input readonly class="form-control" type="text" value="<?= $key['id_sparepart'] ?>" name="id" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <span for="nama" class="col-sm-3 col-form-label">Nama</span>
                            <div class="col-sm-9">
                                <input required value="<?= $key['nama_sparepart'] ?>" class="form-control" type="text" name="nama" />
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
                            <span for="nama" class="col-sm-3 col-form-label">Harga</span>
                            <div class="col-sm-9">
                                <input required value="<?= $key['harga'] ?>" class="form-control" type="text" name="harga" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <span for="nama" class="col-sm-3 col-form-label">Stok</span>
                            <div class="col-sm-9">
                                <input required value="<?= $key['stok'] ?>" class="form-control" type="text" name="stok" />
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