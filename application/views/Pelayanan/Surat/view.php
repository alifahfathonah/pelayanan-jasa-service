<div class="table-responsive">
    <table id="tb" class="table table-striped table-md tabel-spk">
        <thead>
            <tr>
                <th>No</th>
                <th>Aksi</th>
                <th>ID SPK</th>
                <th>Status Service</th>
                <th>Teknisi</th>
                <th>Pelanggan</th>
                <th>Status Bayar</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($spk as $key) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <?php $query = "SELECT * FROM tb_info WHERE id_surat = '$key[id_surat]'";
                    $cek = $this->db->query($query)->num_rows();
                    $pecah = $this->db->query($query)->row_array();
                    ?>
                    <td>
                        <a title="Detail" href="<?= base_url('surat/detail/') . $key['id_surat'] ?>" class="btn btn-info"><i class="fa fa-eye"></i></a>
                        <button data-toggle="modal" data-target="#infoterbaru<?= $pecah['id_info'] ?>" title="Info Jadwal" class="btn btn-warning"><i class="fa fa-info-circle"></i></button>
                    </td>
                    <td><?= $key['id_surat'] ?></td>
                    <td>
                        <?php if ($key['status_service'] == "selesai") { ?>
                            <p class="badge badge-pill badge-success">Service telah selesai</p>
                        <?php } else if ($key['status_service'] == 'belum') { ?>
                            <p class="badge badge-pill badge-danger">Belum dikerjakan</p>
                        <?php } else if ($key['status_service'] == 'otw') { ?>
                            <p class="badge badge-pill badge-primary">Teknisi menuju ke lokasi</p>
                        <?php } else { ?>
                            <p class="badge badge-pill badge-warning">Teknisi meservice barang ke harco</p>
                        <?php } ?>
                    </td>
                    <td><?= $key['nama'] ?></td>
                    <td><?= $key['nama_pelanggan'] ?></td>
                    <td>
                        <?php if ($key['status_bayar'] == 'belum') { ?>
                            <p class="badge badge-pill badge-danger">Belum Bayar</p>
                        <?php } else { ?>
                            <p class="badge badge-pill badge-success">Sudah Bayar</p>
                        <?php } ?>
                    </td>
                    <td><?= $key['tgl'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>