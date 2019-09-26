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
                        <?php if ($keluhan['nama_authorized'] == 'Daikin') { ?>
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
                        <?php } else if ($keluhan['nama_authorized'] == 'Sanken') { ?>
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
                            <form action="<?= base_url('surat/prosesBuat') ?>" method="post">
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
                                    <td>
                                        <input type="text" class="form-control" name="id_surat" value="<?= $this->fungsi->kode_spk() ?>">
                                    </td>
                                    <td></td>
                                    <td><b><?= tgl_indo($keluhan['tgl_keluhan']) ?></b></td>
                                    <td></td>
                                    <td></td>
                                    <td colspan="3"></td>
                                    <td colspan="2">
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#cek">CEK</button>
                                        <input type="hidden" name="id_keluhan" value="<?= $keluhan['id_keluhan'] ?>">
                                        <select name="user" class="form-control select2" id="">
                                            <option value=""> -- Pilih --</option>
                                            <?php foreach ($teknisi as $user) : ?>
                                                <option value="<?= $user->id_user ?>" <?= set_value('user') == $user->id_user ? 'selected' : 'null' ?>><?= $user->nama ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?= form_error('user') ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">Pemohon</td>
                                    <td colspan="5" class="text-center">Pengukuran</td>
                                    <td>Keterangan</td>
                                </tr>
                                <tr>
                                    <td colspan="4">Nama : <b><?= $keluhan['pemohon'] ?></b></td>
                                    <td>Data Teknik</td>
                                    <td>1</td>
                                    <td>2</td>
                                    <td>3</td>
                                    <td>Suhu</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="2" rowspan="2">Alamat : <b><?= $keluhan['alamat_pemohon'] ?></b></td>
                                    <td colspan="2" rowspan="2">Telepon : <b><?= $keluhan['no_pemohon'] ?></b></td>
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
                                    <td colspan="2">Contact Person : <b><?= $keluhan['nama_pelanggan'] ?></b></td>
                                    <td colspan="2">Telepon : <b><?= $keluhan['no_telp'] ?></b></td>
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
                                    <td colspan="4">Nama : <b><?= $keluhan['nama_pelanggan'] ?></b> </td>
                                    <td>Ampere Kipas CPU</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>A</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="2" rowspan="2">Alamat : <b><?= $keluhan['alamat'] ?></b></td>
                                    <td colspan="2" rowspan="2">Telepon : <b><?= $keluhan['no_telp'] ?></b></td>
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
                                    <td colspan="4">No Penawaran/Kontrak Service</td>
                                    <td>Tekanan OG</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Kg/cm</td>
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
                                    <td><b><?= $keluhan['type'] ?></b></td>
                                    <td><b><?= $keluhan['seri_barang'] ?></b></td>
                                    <td></td>
                                    <td></td>
                                    <td colspan="6"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td colspan="6"></td>
                                </tr>
                                <tr>
                                    <td rowspan="2">Tanggal</td>
                                    <td rowspan="2">Nama Teknisi</td>
                                    <td rowspan="2">Lama Kerja</td>
                                    <td rowspan="2">Jarak</td>
                                    <td rowspan="2">Kode Jasa & No. Sparepart</td>
                                    <td rowspan="2">Problem</td>
                                    <td rowspan="2">Tindakan</td>
                                    <td rowspan="2">Solusi</td>
                                    <td rowspan="2">Paraf Teknisi</td>
                                    <td rowspan="2">Biaya</td>
                                </tr>
                                <tr></tr>
                                <tr>
                                    <td>
                                        <input type="date" name="info" value="<?= set_value('info') ?>" class="form-control">
                                        <?= form_error('info') ?>
                                        <input type="time" name="ket" value="<?= set_value('ket') ?>" class="form-control">
                                        <?= form_error('ket') ?>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td><b></b></td>
                                    <td></td>
                                    <td><b></b></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td rowspan="3" colspan="2">Catatan Nomor Perbaikan <br><br><br> <b></b>
                                        <?php foreach ($nomor_kel as $merk) {
                                            $merk = $merk['nama_authorized'];
                                        } ?>
                                        <select <?= $merk == 'Random' ? 'disabled' : null ?> name="nomor" class="form-control select2" id="">
                                            <option value=""> -- Pilih --</option>
                                            <?php foreach ($nomor as $nm) : ?>
                                                <option value="<?= $nm->id_nomor ?>" <?= set_value('nomor') == $nm->id_nomor ? 'selected' : 'null' ?>><?= $nm->nomor_perbaikan ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?= form_error('nomor') ?>
                                    </td>
                                    <td rowspan="3" colspan="2">
                                        Status Pembayaran
                                    </td>
                                    <td class="text-center" rowspan="3" colspan="2">TTD Supervisor

                                    </td>
                                    <td rowspan="3" colspan="3">Saya menyatakan bahwa Daikin sudah menyelesaikan perbaiakan


                                    </td>
                                    <td class="text-center" rowspan="3">TTD Teknisi
                                    </td>
                                </tr>
                                <tr></tr>
                                <tr></tr>

                        </table>
                        <div class="text-center">
                            <a href="<?= base_url('keluhan') ?>" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Buat</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="cek" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="">Tanggal</label>
                                <input type="date" class="form-control" id="tglService" name="tglService">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Teknisi</label>
                                <select class="form-control" name="teknisiService" id="teknisiService">
                                    <option value="">-- Pilih --</option>
                                    <option value="Udin">Udin</option>
                                    <option value="Anang">Anang</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Kota</label>
                                <select class="form-control" name="kotaService" id="kotaService">
                                    <option value="">-- Pilih --</option>
                                    <option value="kudus">Kudus</option>
                                    <option value="pati">Pati</option>
                                    <option value="demak">Demak</option>
                                    <option value="jepara">Jepara</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" id="cekService">Cek</button>
                </form>
                <div id="dataService"></div>
            </div>
        </div>
    </div>
</div>