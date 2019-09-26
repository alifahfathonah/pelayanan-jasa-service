<section class="section">
    <div class="section-header">
        <h1>Pasok Stok</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#"></a>Master Data</div>
            <div class="breadcrumb-item">Pasok Stok</div>
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
                                        <th>Nama Sparepart</th>
                                        <th>Jumlah</th>
                                        <th>Tanggal Pasok</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($tampilSemua as $key) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $key['nama_sparepart'] ?></td>
                                            <td><?= $key['jumlah'] ?></td>
                                            <td><?= $key['tgl_pasok'] ?></td>

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