<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h6>Authorized Service Center</h6>
                <h6>HARCO ELEKTRONIK</h6>
                <h6>Pusat Layanan Resmi Produk</h6>
                <p>Email : harco_asc@yahoo.co.id <br> Jl. Raya Kudus - Pati Km 4 Kudus</p>
                <div class="table-responsive">
                    <table border="1" class="table table-md mt-2" width="100%">
                        <tr>
                            <td>Nama</td>
                            <td colspan="3"><b><?= $biaya['nama_pelanggan'] ?></b></td>
                            <td>Tgl. Terima</td>
                            <td><b><?= tgl_indo($biaya['tgl_keluhan']) ?></b></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td colspan="3" rowspan="2"><b><?= $biaya['alamat'] ?></b></td>
                            <td>Tgl. Selesai</td>
                            <td><b><?= tgl_indo($biaya['tgl']) ?></b></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Kelengkapan</td>
                            <td></td>
                        </tr>
                        <tr>
                            <?php $pecah = explode(' ', $biaya['alamat']);
                            $ambil = end($pecah);
                            ?>
                            <td>Kota</td>
                            <td><b><?= $ambil ?></b></td>
                            <td>No. HP</td>
                            <td><b><?= $biaya['no_telp'] ?></b></td>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <td>Produk</td>
                            <td><b><?= $biaya['nama_barang'] ?></b></td>
                            <td>Tgl. Beli</td>
                            <td></td>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <td>Model</td>
                            <td><b><?= $biaya['type'] ?></b></td>
                            <td>Seri</td>
                            <td><b><?= $biaya['seri_barang'] ?></b></td>
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <td>Keluhan</td>
                            <td colspan="5"><b><?= $biaya['hasil'] ?></b></td>
                        </tr>
                        <tr>
                            <td class="text-center">No</td>
                            <td class="text-center" colspan="3">Nama Sparepart</td>
                            <td class="text-center">Jumlah</td>
                            <td class="text-center">Harga</td>
                        </tr>
                        <?php $no = 1;
                        foreach ($spar as $key) : ?>
                            <tr>
                                <td class="text-center"><b><?= $no++ ?></b></td>
                                <td colspan="3"><b><?= $key['nama_sparepart'] ?></b></td>
                                <td class="text-center"><b><?= $key['jumlah'] ?></b></td>
                                <td class="text-center"><b>Rp. <?= number_format($key['harga']) ?></b></td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td class="text-center">Konsumen</td>
                            <td class="text-center" colspan="2">Teknisi</td>
                            <td class="text-center">Penerima</td>
                            <td>Biaya Sparepart</td>
                            <td class="text-center"><b>Rp. <?= number_format($total['subtotal']) ?></b></td>
                        </tr>
                        <tr>
                            <td rowspan="3"></td>
                            <td colspan="2" rowspan="3"></td>
                            <td rowspan="3"></td>
                            <td>Biaya Reparasi</td>
                            <td class="text-center"><b>Rp. <?= number_format($biaya['biaya_jasa']) ?></b></td>
                        </tr>
                        <tr>
                            <td>Biaya Transpot</td>
                            <td class="text-center"><b>Rp. <?= number_format($biaya['biaya_transpot']) ?></b></td>
                        </tr>
                        <tr>
                            <td>Total Biaya</td>
                            <td class="text-center"><b>Rp. <?= number_format($biaya['total_bayar']) ?></b></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>