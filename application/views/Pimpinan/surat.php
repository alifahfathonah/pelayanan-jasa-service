<section class="section">
    <div class="section-header">
        <h1>Surat Perintah Kerja</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#"></a>Transaksi</div>
            <div class="breadcrumb-item">Surat Perintah Kerja</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Surat Perintah Kerja</h2>
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <?php $this->view('message'); ?>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="tb" class="table table-striped table-md tabel-spk">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Konfirmasi</th>
                                        <th>ID SPK</th>
                                        <th>Teknisi</th>
                                        <th>Pelanggan</th>
                                        <th>Barang Elektronik</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($spk as $key) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td class="text-center">
                                                <form method="post" action="<?= base_url('_pimpinan/surat/ttd') ?>">
                                                    <input type="hidden" name="id" value="<?= $key['id_surat'] ?>">
                                                    <?php if ($key['ttd'] == 'sudah') { ?>
                                                        <button type="submit" class="btn btn-primary">Tanda Tangani</button>
                                                    <?php } else if ($key['ttd'] == 'sudah2') { ?>
                                                        <div class="badge badge-pill badge-success mb-1">Tertanda Tangani</div>
                                                    <?php } ?>
                                                </form>
                                            </td>
                                            <td><a href="<?= base_url('_pimpinan/surat/detail/') . $key['id_surat'] ?>"><?= $key['id_surat'] ?></a></td>
                                            <td><?= $key['nama'] ?></td>
                                            <td><?= $key['nama_pelanggan'] ?></td>
                                            <td><?= $key['nama_barang'] ?></td>
                                            <td><?= $key['tgl'] ?></td>
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