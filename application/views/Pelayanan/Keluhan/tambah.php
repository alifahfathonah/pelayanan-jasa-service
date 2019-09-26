<section class="section">
    <div class="section-header">
        <h1>Keluhan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Transaksi</a></div>
            <div class="breadcrumb-item"><a href="#"></a>Keluhan</div>
            <div class="breadcrumb-item">Tambah Keluhan</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah Keluhan</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data" action="">
                            <div class="form-group col-md-4">
                                <label for="">Pilih Pemohon</label>
                                <select name="pilih" class="form-control" id="pilih">
                                    <option value="">-- Pilih --</option>
                                    <option value="1">Call Center</option>
                                    <option value="2">Toko</option>
                                </select>
                            </div>
                            <div class="form-row">
                                <div id="formPemohon" class="form-group col-md-4">
                                    <label for="">Pemohon</label>
                                    <input type="text" value="<?= set_value('pemohon') ?>" class="form-control" id="pemohon" name="pemohon">
                                    <?= form_error('pemohon') ?>
                                </div>
                                <div id="formAlamat" class="form-group col-md-4">
                                    <label for="">Alamat Pemohon</label>
                                    <textarea name="alamat_p" id="alamat_p" cols="30" value="<?= set_value('alamat_p') ?>" rows="10" class="form-control"></textarea>
                                    <?= form_error('alamat_p') ?>
                                </div>
                                <div id="formNo" class="form-group col-md-4">
                                    <label for="">No. Telepon Pemohon</label>
                                    <input type="text" class="form-control" id="no_p" value="<?= set_value('no_p') ?>" name="no_p">
                                    <?= form_error('no_p') ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3 mr-5">
                                    <label>Nama Pelanggan</label>
                                    <input type="hidden" name="id_pel" value="<?= $this->fungsi->kode_otomatis('id_pelanggan', 'tb_pendaftaran', 'PEL') ?>">
                                    <input type="text" name="nama" value="<?= set_value('nama') ?>" class="form-control">
                                    <?= form_error('nama') ?>
                                    <br>
                                    <label for="">Garansi</label>
                                    <div class="custom-file">
                                        <input type="file" required name="gambar" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="form-label">Jenis Kelamin</label>

                                    <div class="selectgroup selectgroup-pills">
                                        <label class="selectgroup-item">
                                            <input type="radio" required name="jekel" value="laki-laki" class="selectgroup-input" checked="">
                                            <span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-male"></i></span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" required name="jekel" value="perempuan" class="selectgroup-input">
                                            <span class="selectgroup-button selectgroup-button-icon"><i class="fas fa-female"></i></span>
                                        </label>
                                    </div><br>
                                    <label for="">Latitude</label>
                                    <input readonly type="text" class="form-control" name="lat" id="lat">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>No Telepon</label>
                                    <input type="text" name="no" value="<?= set_value('no') ?>" autocomplete="off" class="form-control"><br>
                                    <?= form_error('no') ?>
                                    <label for="">Longitude</label>
                                    <input readonly type="text" class="form-control" name="long" id="long">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Alamat</label>
                                    <textarea class="form-control" value="<?= set_value('alamat') ?>" name="alamat" id="alamat" cols="30" rows="10"></textarea><br>
                                    <?= form_error('alamat') ?>
                                    <button id="cek" class="btn btn-primary mt-2">Cek</button>
                                    <div style="font-size: smaller; font-style: italic" id='eror' class="text-danger">*setelah mengisi alamat silahkan klik tombol cek</div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>Barang Elektronik</label>
                                    <input type="hidden" name="id" value="<?= $this->fungsi->kode_keluhan() ?>">
                                    <select required name="id_be" class="form-control select2">
                                        <option value=""> -- Pilih --</option>
                                        <?php foreach ($be as $be) : ?>
                                            <option value="<?= $be['id_barangelektronik'] ?>"><?= $be['nama_barang'] . " " . $be['type'] . " - " . $be['nama_authorized'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div style="font-size: smaller">*) selain merk daikin & sanken pilih merk random</div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Seri</label>
                                    <input type="text" name="seri" value="<?= set_value('seri') ?>" autocomplete="off" class="form-control">
                                    <?= form_error('seri') ?>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Keluhan</label>
                                    <textarea name="keluhan" id="" cols="35" class="form-control" rows="20"><?= set_value('keluhan') ?></textarea>
                                    <?= form_error('keluhan') ?>
                                </div>
                            </div>
                            <div class="text-center">
                                <input type="submit" value="Simpan" class="btn btn-success" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $('#cek').click(function() {
        var address = $('#alamat').val();
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({
            'address': address
        }, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                $('#lat').val(results[0].geometry.location.lat())
                $('#long').val(results[0].geometry.location.lng())
            } else {
                alert('Geocode was not successful for the following reason: ' + status);
            }
        });
    })
</script>