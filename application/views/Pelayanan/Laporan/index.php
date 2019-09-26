<section class="section">
    <div class="section-header">
        <h1>Laporan Service</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#"></a>Laporan</div>
            <div class="breadcrumb-item">Laporan Service</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Laporan Service</h2>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="get" action="">
                            <div class="form-group">
                                <label>Filter Berdasarkan</label><br>
                                <select class="form-control selectric" name="filter" id="filter">
                                    <option value="">Pilih</option>
                                    <option value="1">Per Tanggal</option>
                                    <option value="2">Per Bulan</option>
                                    <option value="3">Per Tahun</option>
                                    <option value="4">Merk</option>
                                    <option value="5">Teknisi</option>
                                    <option value="6">Kota</option>
                                </select>
                            </div>
                            <div class="form-group" id="merk">
                                <label>Pilih Merk</label><br>
                                <select class="form-control selectric" name="merk">
                                    <option value="">Pilih</option>
                                    <option value="Daikin">Daikin</option>
                                    <option value="Sanken">Sanken</option>
                                </select>
                            </div>
                            <div class="form-group" id="teknisi">
                                <label>Pilih Teknisi</label><br>
                                <select class="form-control selectric" name="teknisi">
                                    <option value="">Pilih</option>
                                    <?php foreach ($teknisi as $tk) : ?>
                                        <option value="<?= $tk['nama'] ?>"><?= $tk['nama'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group" id="kota">
                                <label>Pilih Kota</label><br>
                                <select class="form-control selectric" name="kota">
                                    <option value="">Pilih</option>
                                    <option value="kudus">Kudus</option>
                                    <option value="demak">Demak</option>
                                    <option value="pati">Pati</option>
                                    <option value="jepara">Jepara</option>
                                </select>
                            </div>
                            <div class="form-group" id="form-tanggal">
                                <label>Tanggal</label><br>
                                <input type="text" name="tanggal" class="form-control input-tanggal" />
                            </div>
                            <div class="form-group" id="form-bulan">
                                <label>Bulan</label><br>
                                <select class="form-control selectric" name="bulan">
                                    <option value="">Pilih</option>
                                    <option value="1">Januari</option>
                                    <option value="2">Februari</option>
                                    <option value="3">Maret</option>
                                    <option value="4">April</option>
                                    <option value="5">Mei</option>
                                    <option value="6">Juni</option>
                                    <option value="7">Juli</option>
                                    <option value="8">Agustus</option>
                                    <option value="9">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                            </div>
                            <div class="form-group" id="form-tahun">
                                <label>Tahun</label><br>
                                <select class="form-control selectric" name="tahun">
                                    <option value="">Pilih</option>
                                    <?php
                                    foreach ($option_tahun as $data) { // Ambil data tahun dari model yang dikirim dari controller
                                        echo '<option value="' . $data->tahun . '">' . $data->tahun . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <button class="btn btn-primary" type="submit">Tampilkan</button>
                            <a class="btn btn-warning" href="<?php echo base_url('laporan'); ?>">Reset Filter</a>
                        </form>
                        <hr />

                        <b><?php echo $ket; ?></b><br /><br />
                        <a title="print" href="<?php echo $url_cetak; ?>" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i></a><br /><br />
                        <table id="tb" class="table table-striped table-hover table-borderless">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Aksi</th>
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
                                            <td>
                                                <a class="btn btn-info" href="<?= base_url('laporan/detail/') . $data->id_surat ?>"><i class="fa fa-eye"></i></a>
                                            </td>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="<?php echo base_url('assets/jquery-ui/jquery-ui.min.js'); ?>"></script> <!-- Load file plugin js jquery-ui -->
<script>
    $(document).ready(function() { // Ketika halaman selesai di load
        $('.input-tanggal').datepicker({
            dateFormat: 'yy-mm-dd' // Set format tanggalnya jadi yyyy-mm-dd
        });
        $('#form-tanggal, #form-bulan, #form-tahun, #merk, #teknisi, #kota').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya
        $('#filter').change(function() { // Ketika user memilih filter
            if ($(this).val() == '1') { // Jika filter nya 1 (per tanggal)
                $('#form-bulan, #form-tahun, #merk, #teknisi, #kota').hide(); // Sembunyikan form bulan dan tahun
                $('#form-tanggal').show(); // Tampilkan form tanggal
            } else if ($(this).val() == '2') { // Jika filter nya 2 (per bulan)
                $('#form-tanggal, #merk, #teknisi, #kota').hide(); // Sembunyikan form tanggal
                $('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
            } else if ($(this).val() == '3') { // Jika filternya 3 (per tahun)
                $('#form-tanggal, #form-bulan, #merk, #teknisi, #kota').hide(); // Sembunyikan form tanggal dan bulan
                $('#form-tahun').show(); // Tampilkan form tahun
            } else if ($(this).val() == '4') { // Jika filternya 3 (per tahun)
                $('#form-tanggal, #form-bulan, #form-tahun, #teknisi, #kota').hide(); // Sembunyikan form tanggal dan bulan
                $('#merk').show(); // Tampilkan form tahun
            } else if ($(this).val() == '5') { // Jika filternya 3 (per tahun)
                $('#form-tanggal, #form-bulan, #form-tahun, #merk, #kota').hide(); // Sembunyikan form tanggal dan bulan
                $('#teknisi').show(); // Tampilkan form tahun
            } else {
                $('#form-tanggal, #form-bulan, #form-tahun, #merk, #teknisi').hide(); // Sembunyikan form tanggal dan bulan
                $('#kota').show();
            }
            $('#form-tanggal input, #form-bulan select, #form-tahun select, #merk, #teknisi').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
        })
    })
</script>