<section class="section">
    <div class="section-header">
        <h1>Pembayaran</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#"></a>Transaksi</div>
            <div class="breadcrumb-item">Pembayaran</div>
        </div>
    </div>

    <div class="section-body">
        <div class="invoice">
            <div class="invoice-print">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="invoice-title mb-3">
                            <h2>Tagihan</h2>
                            <div class="invoice-number"><?= $bn['id_surat'] ?></div>
                        </div>
                        <div class="row ml-0">
                            <div class="col-md-6">
                                <address>
                                    <strong>Data Pelanggan:</strong><br>
                                    <?= $bn['nama_pelanggan'] ?><br>
                                    <?= $bn['no_telp'] ?><br>
                                    <?= $bn['alamat'] ?><br>
                                    Jawa Tengah, Indonesia
                                </address>
                            </div>
                            <div class="col-md-6 text-md-right">
                                <address class="p-2">
                                    <strong>Barang Elektronik:</strong><br>
                                    <?= $bn['nama_barang'] . " - " . $bn['type'] ?>r<br>
                                    Seri <?= $bn['seri_barang'] ?><br>
                                    <?= $bn['nama_authorized'] ?><br>
                                </address>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="row mt-4">
                            <div class="col-lg-8">
                                <div class="section-title">Sparepart</div>
                            </div>
                            <div class="col-lg-4 text-right">
                                <div class="invoice-detail-item">
                                    <div class="invoice-detail-name">Silahkan Pilih</div>
                                    <div class="invoice-detail-value"><button data-toggle="modal" data-target="#tambahSpar" class="btn btn-primary">Pilih</button></div>
                                </div>
                            </div>
                        </div>
                        <div class="viewdetail">
                            <!-- <?php $this->load->view('teknisi/view', ['detail' => $detail]) ?> -->
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-md">
                                    <tr>
                                        <th data-width="40">No</th>
                                        <th class="text-center">Aksi</th>
                                        <th>Sparepart</th>
                                        <th class="text-center">Harga</th>
                                        <th class="text-center">Jumlah</th>
                                        <th class="text-right">Total</th>
                                    </tr>
                                    <?php
                                    $no = 1;
                                    if ($jumlahData > 0) {
                                        foreach ($detail as $k) :
                                            $total = $k['harga'] * $k['jumlah'];
                                            ?>
                                            <tr>
                                                <td class="text-center"><?= $no++ ?></td>
                                                <td class="text-center">
                                                    <form action="<?= base_url('_teknisi/pembayaran/hapusSpar') ?>" method="post">
                                                        <input type="hidden" name="jml" value="<?= $k['jumlah'] ?>">
                                                        <input type="hidden" name="id_spar" value="<?= $k['id_sparepart'] ?>">
                                                        <input type="hidden" name="id_detail" value="<?= $k['id_detail'] ?>">
                                                        <input type="hidden" name="id_surat" value="<?= $k['id_surat'] ?>">
                                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                    </form>
                                                </td>
                                                <td><?= $k['nama_sparepart'] ?></td>
                                                <td class="text-center">Rp. <?= number_format($k['harga'], 2, ",", ".") ?></td>
                                                <td class="text-center"><?= $k['jumlah'] ?></td>
                                                <td class="text-right">Rp. <?= number_format($total, 2, ",", ".") ?> </td>
                                            </tr>
                                        <?php endforeach;
                                } else {
                                    ?>
                                        <tr>
                                            <td colspan="6" class="text-center">Tidak ada data yang dipilih</td>
                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <td class="text-center" colspan="5"><b>Total</b></td>
                                        <td class="text-right" onkeyup="getTotal()" id="sub2">Rp. <?= number_format($totalSpar['subtotal'], 2, ",", ".") ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-lg-8">
                                <div class="section-title">Keluhan</div>
                                <p class="section-lead"><?= $bn['keluhan'] ?> </p>
                            </div>
                        </div>
                        <form action="<?= base_url('_teknisi/pembayaran/simpan') ?>" method="post">
                            <?php if ($bn['garansi'] == 'ya') { ?>
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="section-title">Garansi</div>
                                        <div class="col-8">
                                            <label for="">Nomor garansi</label>
                                            <input type="hidden" name="id_keluhan" value="<?= $bn['id_keluhan'] ?>">
                                            <input type="text" name="garansi" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            <?php  } ?>
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="section-title">Hasil</div>
                                    <div class="form-group col-8">
                                        <label for="">Kode Kerusakan</label>
                                        <input type="text" class="form-control" name="kode">
                                    </div>
                                    <div class="form-group col-8">
                                        <label for="">Masalah</label>
                                        <textarea name="hasil" class="form-control" id="" cols="20" rows="10"></textarea>
                                    </div>
                                    <div class="form-group  col-8">
                                        <label for="">Tindakan</label>
                                        <textarea name="tindakan" class="form-control" id="" cols="20" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4 text-right">
                                    <div class="invoice-detail-item" style="margin-top:57px">
                                        <div class="invoice-detail-name">Biaya Jasa</div>
                                        <div class="invoice-detail-value">
                                            <?php if ($bn['nama_authorized'] == "Sanken") {
                                                $harga = 65000;
                                            } else if ($bn['nama_authorized'] == "Daikin") {
                                                $harga = 75000;
                                            }
                                            ?>
                                            <input type="hidden" name="id" value="<?= $bn['id_surat'] ?>">
                                            <input type="hidden" name="biaya" value="<?= $harga ?>" required id="sub1" placeholder="biaya service" class="form-control">
                                            <div class="invoice-detail-value invoice-detail-value-lg">Rp. <?= number_format($harga, 2, ",", ".") ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-lg-8">
                                    <div class="section-title">Transportasi</div>
                                    <p>Dari Harco Elektronik ke Lokasi = <b><span id="jarak"></span> Km</b></p>
                                </div>
                                <div class="col-lg-4 text-right">
                                    <div class="invoice-detail-item" style="margin-top:45px">
                                        <div class="invoice-detail-name">Biaya Transpot</div>
                                        <div class="invoice-detail-value">
                                            <input type="hidden" name="transpot" required id="transpot" placeholder="biaya service" class="form-control">
                                            <div class="invoice-detail-value invoice-detail-value-lg" id="biaya_transpot">Rp. </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-lg-8">

                                </div>
                                <div class="col-lg-4 text-right">
                                    <hr class="mt-2 mb-2">
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">Total</div>
                                        <input type="hidden" name="total_bayar" id="total_bayar">
                                        <div class="invoice-detail-value invoice-detail-value-lg" id="totalSemua">Rp. </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="text-md-right">
                <div class="float-lg-left mb-lg-0 mb-3">
                </div>
                <button type="submit" class="btn btn-warning btn-icon icon-left"> Simpan</button>
                </form>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="tambahSpar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Tambah Sparepart</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="tb" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Sparepart</th>
                                <th class="text-center">Stok</th>
                                <th class="text-center">Jumlah</th>
                                <th class="text-center">#</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $query = "SELECT a.id_sparepart, a.nama_sparepart, a.stok, b.nama_authorized FROM tb_sparepart a INNER JOIN tb_authorized b ON a.id_authorized=b.id_authorized WHERE b.nama_authorized='$bn[nama_authorized]' AND stok != 0";
                            $sparepart = $this->db->query($query)->result_array();
                            foreach ($sparepart as $sp) : ?>
                                <tr>
                                    <td><?= $sp['nama_sparepart'] . " - " . $sp['nama_authorized'] ?></td>
                                    <td class="text-center"><?= $sp['stok'] ?></td>
                                    <td class="text-center" width="55px">
                                        <form method="post" action="<?= base_url('_teknisi/pembayaran/simpanSparepart') ?>">
                                            <input type="text" class="form-control" name="jml">
                                            <input type="hidden" class="form-control" name="id_surat" value="<?= $bn['id_surat'] ?>">
                                            <input type="hidden" class="form-control" name="id_spar" value="<?= $sp['id_sparepart'] ?>">
                                    </td>
                                    <td class="text-center">
                                        <button type="submit" class="btn btn-info"><i class="fa fa-plus"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // console.log(sub4)
    $(document).ready(function() { //event pada saat document telah selesai loadingnya
        cekTeknisi();
    })

    function formatNumber(num) {
        return 'Rp. ' + num.toFixed(2).replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
    }

    var lat_p = '-6.8048574'
    var lng_p = '110.8758004'
    var lat_a = <?= $bn['pelanggan_lat']; ?>;
    var lng_a = <?= $bn['pelanggan_long']; ?>;

    var from = new google.maps.LatLng(lat_p, lng_p)
    var to = new google.maps.LatLng(lat_a, lng_a)
    var jarak = google.maps.geometry.spherical.computeDistanceBetween(from, to)
    var km = (jarak / 1000).toFixed(1)
    if (km <= 20) {
        var hb = 25000
    } else if (km <= 30) {
        var hb = 50000
    } else if (km <= 40) {
        var hb = 75000
    } else if (km <= 50) {
        var hb = 100000
    }
    $('#jarak').html(km)
    var transpot = hb
    var transpot_rp = formatNumber(transpot)
    $('#transpot').val(transpot)
    $('#biaya_transpot').html(transpot_rp)

    var sub1 = $('#sub1').val();
    var sub2 = $('#sub2').html();
    var sub3 = sub2.substr(4)
    console.log(sub3)
    var transpot_b = $('#transpot').val();
    var sub4 = sub3.replace('.', '')
    var sub5 = sub4.replace('.', '')
    console.log(sub5)

    var totalSemua = parseInt(sub1) + parseInt(sub5) + parseInt(transpot_b)
    var hasil = formatNumber(totalSemua)
    $('#totalSemua').html(hasil)
    $('#total_bayar').val(totalSemua)
</script>