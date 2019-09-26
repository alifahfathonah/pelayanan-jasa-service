<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 id="judul">Daftar Pelanggan</h4>
            </div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data" action="<?= base_url('auth/register') ?>">
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label>Nama</label>
                            <input type="hidden" name="id" value="<?= $this->fungsi->kode_otomatis('id_pelanggan', 'tb_pendaftaran', 'PEL') ?>" id="">
                            <input type="text" value="<?= set_value('nama') ?>" name="nama" autocomplete="name" class="form-control">
                            <?= form_error('nama') ?>
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
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label>No Telepon/HP</label>
                            <input type="text" name="telp" value="<?= set_value('telp') ?>" autocomplete="off" class="form-control">
                            <?= form_error('telp') ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label>Username</label>
                            <input type="text" name="user" value="<?= set_value('user') ?>" autocomplete="off" class="form-control">
                            <?= form_error('user') ?>
                        </div>
                        <div class="form-group col-md-5">
                            <label>Password</label>
                            <input type="password" name="pass" autocomplete="off" class="form-control">
                            <?= form_error('pass') ?>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label>Alamat</label>
                            <textarea name="alamat" id="" cols="30" class="form-control" rows="3"><?= set_value('alamat') ?></textarea>
                            <?= form_error('alamat') ?>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="">Foto</label>
                            <div id="image-preview" class="image-preview">
                                <label for="image-upload" id="image-label">Choose File</label>
                                <input type="file" name="gambar" id="image-upload" />
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div id="map" class="col-lg-8 col-lg-offset-4"></div>
                        <div style="font-size: smaller; font-style: italic" id='eror' class="text-danger">*arahkan marker sesuai alamat rumah anda</div>
                        <br>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label>Latitude</label>
                            <input type="text" id="lat" readonly name="lat" autocomplete="off" class="form-control">
                        </div>
                        <div class="form-group col-md-5">
                            <label>Longitude</label>
                            <input type="text" id="lng" readonly name="long" autocomplete="off" class="form-control">
                        </div>
                    </div>
                    <center>
                        <button type="submit" class="btn btn-primary">
                            Sign Up
                        </button>
                    </center>
                </form>
                <div style="font-size: smaller;" id='eror' class="text-danger"></div>
            </div>
        </div>
    </div>
</div>

<script>
    function updateMarkerPosition(latLng) {
        document.getElementById('lat').value = [latLng.lat()];
        document.getElementById('lng').value = [latLng.lng()];
    }

    var myOptions = {
        zoom: 12,
        scaleControl: true,
        center: new google.maps.LatLng(-6.815344, 110.846005),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };


    var map = new google.maps.Map(document.getElementById("map"),
        myOptions);

    var marker1 = new google.maps.Marker({
        position: new google.maps.LatLng(-6.815344, 110.846005),
        title: 'lokasi',
        map: map,
        draggable: true
    });

    //updateMarkerPosition(latLng);

    google.maps.event.addListener(marker1, 'drag', function() {
        updateMarkerPosition(marker1.getPosition());
    });
</script>