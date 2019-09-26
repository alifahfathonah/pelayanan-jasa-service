<section class="section">
    <div class="section-header">
        <h1>Data Pelanggan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#"></a>Transaksi</div>
            <div class="breadcrumb-item">Data Pelanggan</div>
        </div>
    </div>

    <div class="section-body">

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
                                        <th>Nama Pelanggan</th>
                                        <th>Jenis Kelamin</th>
                                        <th>No Telepon</th>
                                        <th>Alamat</th>
                                        <th>Foto</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($pelanggan as $key) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $key['nama_pelanggan'] ?></td>
                                            <td><?= ucfirst($key['jekel']) ?></td>
                                            <td><?= $key['no_telp'] ?></td>
                                            <td><?= $key['alamat'] ?></td>
                                            <td><?= $key['foto'] ?></td>

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