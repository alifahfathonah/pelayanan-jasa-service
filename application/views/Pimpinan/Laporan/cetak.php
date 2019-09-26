<link rel="stylesheet" href="<?= base_url() ?>assets/modules/bootstrap/css/bootstrap.min.css">

<body onload="window.print();">
    <br><br>
    <table class="p-3" width='100%' border='0'>
        <tr>
            <td class="text-center">
                <h3>Harco Elektronik</h3>
            </td>
        </tr>
        <tr>
            <td class="text-center">
                <h3>Laporan Service</h3>
            </td>
        </tr>
        <tr>
            <td class="text-center">
                <h6><?= $ket ?></h6>
            </td>
        </tr>
    </table>
    <hr>
    <table class="table" width='100%' border='0'>
        <thead>
            <tr>
                <th>No</th>
                <th>ID Surat</th>
                <th>Nomor Perbaikan</th>
                <th>Teknisi</th>
                <th>Pelanggan</th>
                <th>Alamat</th>
                <th>Merk</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($transaksi)) {
                $no = 1;
                foreach ($transaksi as $data) { ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $data->id_surat ?></td>
                        <td><?= $data->id_nomor == "8" ? " - " : $data->nomor_perbaikan ?></td>
                        <td><?= $data->nama ?></td>
                        <td><?= $data->nama_pelanggan ?></td>
                        <td><?= $data->alamat ?></td>
                        <td><?= $data->nama_barang . " - " . $data->nama_authorized . " - " . $data->seri_barang ?></td>
                        <td><?= tgl_indo($data->tgl) ?></td>
                    </tr>
                <?php }
        }
        ?>
        </tbody>
    </table>
</body