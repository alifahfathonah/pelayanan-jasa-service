<section class="section">
    <div class="section-header">
        <h1>Surat Perintah Kerja</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#"></a>Transaksi</div>
            <div class="breadcrumb-item">surat</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <?php if ($surat['nama_authorized'] == 'Daikin') { ?>
                            <table width="100%">
                                <tr>
                                    <td>
                                        <h6>PT DAIKIN AIRCONDITIONING INDONESIA </h6>
                                        Gedung Wisma KEIAI Lantai 18 & 19 <br>
                                        Jl. Jendral Sudirman Kav. 3, Karet Tengsin <br>
                                        Jakarta Pusat, DKI Jakarta
                                    </td>
                                    <td class="text-center">
                                        <h6>SURAT PERINTAH KERJA</h6>
                                    </td>
                                    <td class="text-right">
                                        <h6> PT DAIKIN AIRCONDITIONING INDONESIA</h6>
                                        Pusat Service Semarang <br>
                                        Jl. Mt haryono 593, Semarang <br>
                                        Telp. (024) 8412695
                                    </td>
                                </tr>
                            </table>
                        <?php } else if ($surat['nama_authorized'] == 'Sanken') { ?>
                            <table width="100%">
                                <tr>
                                    <td>
                                        <h6>SANKEN </h6>
                                        Pusat Layanan Resmi Produk SANKEN <br>
                                    </td>
                                    <td>
                                        <h6>SURAT PERINTAH KERJA</h6>
                                    </td>
                                </tr>
                            </table>
                        <?php } else { ?>
                            <h6 class="text-center">SURAT PERINTAH KERJA</h6>
                        <?php } ?>

                        <table border="1" class="table table-md mt-2">

                            <tr>
                                <td>Nomor SPK</td>
                                <td>Status</td>
                                <td>Tanggal Permintaan</td>
                                <td>Waktu</td>
                                <td>Perjanjian Konsumen</td>
                                <td colspan="3">Kode Kerusakan</td>
                                <td colspan="2">Teknisi</td>
                            </tr>
                            <tr>
                                <td><b><?= $surat['id_surat'] ?></b></td>
                                <td><b><?= $surat['status_service'] == 'selesai' ? 'Selesai' : '' ?></b></td>
                                <td><b><?= tgl_indo($surat['tgl_keluhan']) ?></b></td>
                                <td></td>
                                <td></td>
                                <td colspan="3"><b><?= $surat['kode_kerusakan'] ?></b></td>
                                <td colspan="2"><b><?= $surat['nama'] ?></b></td>
                            </tr>
                            <tr>
                                <td colspan="4">Pemohon</td>
                                <td colspan="5" class="text-center">Pengukuran</td>
                                <td>Keterangan</td>
                            </tr>
                            <tr>
                                <td colspan="4">Nama : <b><?= $surat['pemohon'] ?></b></td>
                                <td>Data Teknik</td>
                                <td>1</td>
                                <td>2</td>
                                <td>3</td>
                                <td>Suhu</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="2" rowspan="2">Alamat : <b><?= $surat['alamat_pemohon'] ?></b></td>
                                <td colspan="2" rowspan="2">Telepon : <b><?= $surat['no_pemohon'] ?></b></td>
                                <td>MCB</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>A</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Volt</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>V</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="2">Contact Person : <b><?= $surat['nama_pelanggan'] ?></b></td>
                                <td colspan="2">Telepon : <b><?= $surat['no_telp'] ?></b></td>
                                <td>Ampere Total</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>A</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="4">Data Konsumen</td>
                                <td>Ampere Kompresor</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>A</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="4">Nama : <b><?= $surat['nama_pelanggan'] ?></b> </td>
                                <td>Ampere Kipas CPU</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>A</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="2" rowspan="2">Alamat : <b><?= $surat['alamat'] ?></b></td>
                                <td colspan="2" rowspan="2">Telepon : <b><?= $surat['no_telp'] ?></b></td>
                                <td>Tekanan Tinggi</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Kg/cm</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Tekanan Rendah</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Kg/cm</td>
                                <td></td>
                            </tr>
                            <!-- <tr>
                                <td colspan="4" rowspan="2">No Penawaran/Kontrak Service</td>
                                <td>Tekanan OG</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Kg/cm</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Kondensasi In</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>C</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Model Kompresor</td>
                                <td colspan="3"></td>
                                <td>Evaporator In</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>C</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Nomor Kompresor</td>
                                <td colspan="3"></td>
                                <td>Temp Ruangan</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>C</td>
                                <td></td>
                            </tr> -->
                            <tr>
                                <td>Type Unit</td>
                                <td>Nomor Seri</td>
                                <td>Tgl Pasang</td>
                                <td>Nomor Garansi</td>
                                <td>Lain-lain</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><b><?= $surat['type'] ?></b></td>
                                <td><b><?= $surat['seri_barang'] ?></b></td>
                                <td></td>
                                <td><b><?= $surat['garansi'] == 'tidak' ? '' : $surat['garansi'] ?></b></td>
                                <td colspan="6"></td>
                            </tr>
                            <tr>
                                <td rowspan="2">Tanggal</td>
                                <td rowspan="2">Nama Teknisi</td>
                                <td rowspan="2">Lama Kerja</td>
                                <td rowspan="2">Jarak</td>
                                <td rowspan="2">Kode Jasa & Sparepart</td>
                                <td rowspan="2">Problem</td>
                                <td rowspan="2" colspan="2">Tindakan</td>
                                <td rowspan="2">Paraf Teknisi</td>
                                <td rowspan="2">Biaya</td>
                            </tr>
                            <tr></tr>
                            <tr>
                                <td><b><?= tgl_indo($surat['tgl']) ?></b></td>
                                <td><b><?= $surat['nama'] ?></b></td>
                                <td></td>
                                <td><b><span id="jarak"></span> Km</b></td>
                                <td></td>
                                <td></td>
                                <td colspan="2"></td>
                                <td></td>
                                <td><b><?= $surat['biaya_transpot'] ? 'Rp. ' .  number_format($surat['biaya_transpot']) : '' ?></b></td>
                            </tr>
                            <tr>
                                <td colspan="4"></td>
                                <td></td>
                                <td><b><?= $surat['hasil'] ?></b></td>
                                <td colspan="2"><b><?= $surat['tindakan'] ?></b></td>
                                <td></td>
                                <td><b><?= $surat['biaya_jasa'] ? 'Rp. ' .  number_format($surat['biaya_jasa']) : '' ?></b></td>
                            </tr>
                            <?php foreach ($sparepart as $key) : ?>
                                <tr>
                                    <td colspan="4"></td>
                                    <td><b><?= $key['nama_sparepart'] ?></b></td>
                                    <td></td>
                                    <td colspan="2"></td>
                                    <td></td>
                                    <td><b>Rp. <?= number_format($key['harga']) ?></b></td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td rowspan="3" colspan="2">Catatan Nomor Perbaikan <br><br><br> <b><?= $surat['nomor_perbaikan'] == 'tidak' ? ' ' : $surat['nomor_perbaikan'] ?></b></td>
                                <td rowspan="3" colspan="2">
                                    Status Pembayaran <br><b><?= $surat['status_bayar'] == 'sudah' ? 'Lunas' : 'Belum Lunas' ?>
                                        <br><br><br><br>
                                        <b><?= $surat['total_bayar'] ? 'Rp. ' .  number_format($surat['total_bayar']) : '' ?>
                                </td>
                                <td class="text-center" rowspan="3" colspan="2">TTD Supervisor
                                    <?php if ($surat['ttd'] == 'sudah2') { ?>
                                        <br>
                                        <img width="100px" src="<?= base_url('assets/img/ttd/joko.png') ?>" alt=""><br>
                                        <b>Joko</b>
                                    <?php } ?>
                                </td>
                                <td rowspan="3" colspan="3">Saya menyatakan bahwa Daikin sudah menyelesaikan perbaiakan

                                    <!-- <img width="50px" src="<?= base_url('assets/img/ttd/ttd_teknisi1.png') ?>" alt=""><br> -->
                                    <?php if ($surat['ttd'] == 'sudah' && $surat['id_user'] == 'USR004' || $surat['ttd'] == 'sudah2' && $surat['id_user'] == 'USR004') { ?>
                                        <br><br><br><br>
                                        <b><?= tgl_indo($surat['tgl']); ?></b>
                                    <?php } else if ($surat['ttd'] == 'sudah' && $surat['id_user'] == 'USR005' || $surat['ttd'] == 'sudah2' && $surat['id_user'] == 'USR004') { ?>
                                        <br><br><br>
                                        <b><?= tgl_indo($surat['tgl']); ?></b>
                                    <?php } ?>
                                </td>
                                <td class="text-center" rowspan="3">TTD Teknisi
                                    <?php if ($surat['ttd'] == 'sudah' && $surat['id_user'] == 'USR004'  || $surat['ttd'] == 'sudah2' && $surat['id_user'] == 'USR004') { ?>
                                        <img width="50px" src="<?= base_url('assets/img/ttd/ttd_teknisi1.png') ?>" alt=""><br>
                                        <b><?= $surat['nama'] ?></b>
                                    <?php } else if ($surat['ttd'] == 'sudah' && $surat['id_user'] == 'USR005' || $surat['ttd'] == 'sudah2' && $surat['id_user'] == 'USR005') { ?>
                                        <img width="120px" src="<?= base_url('assets/img/ttd/ttd_teknisi2.png') ?>" alt=""><br><br>
                                        <b><?= $surat['nama'] ?></b>
                                    <?php } ?>

                                </td>
                            </tr>
                            <tr></tr>
                            <tr></tr>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    var lat_p = '-6.8048574'
    var lng_p = '110.8758004'
    var lat_a = <?= $surat['pelanggan_lat']; ?>;
    var lng_a = <?= $surat['pelanggan_long']; ?>;

    var from = new google.maps.LatLng(lat_p, lng_p)
    var to = new google.maps.LatLng(lat_a, lng_a)
    var jarak = google.maps.geometry.spherical.computeDistanceBetween(from, to)
    var km = (jarak / 1000).toFixed(1)
    $('#jarak').html(km)
</script>