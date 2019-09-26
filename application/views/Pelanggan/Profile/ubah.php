<div class="col-12 col-md-12 col-lg-7">
    <?php $this->view('message'); ?>
    <div class="card">
        <form method="post" action="<?= base_url('_pelanggan/profile/prosesEdit') ?>" enctype="multipart/form-data" class="needs-validation" novalidate="">
            <div class="card-header">
                <h4>Ubah Profile</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-6 col-12">
                        <label>Nama</label>
                        <input type="hidden" name="id" value="<?= $pelanggan['nama_pelanggan'] ?>">
                        <input type="text" name="nama" class="form-control" value="<?= $pelanggan['nama_pelanggan'] ?>" required="">
                        <div class="invalid-feedback">
                            Nama Belum diisi!
                        </div>
                    </div>
                    <div class="form-group col-md-6 col-12">
                        <label>No Telepon</label>
                        <input type="text" name="no" class="form-control" value="<?= $pelanggan['no_telp'] ?>" required="">
                        <div class="invalid-feedback">
                            No Telepon Belum diisi!
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-7 col-12">
                        <label>Jenis Kelamin</label>
                        <select class="form-control" name="jekel" required="">
                            <option <?= $pelanggan['jekel'] == 'laki-laki' ? 'selected' : null ?> value="laki-laki">laki-laki</option>
                            <option <?= $pelanggan['jekel'] == 'perempuan ' ? 'selected' : null ?> value="perempuan">Perempuan</option>
                        </select>
                        <div class="invalid-feedback">
                            Please fill in the email
                        </div>
                    </div>
                    <div class="form-group col-md-5 col-12">
                        <label>Username</label>
                        <input type="tel" name="user" class="form-control" value="<?= $pelanggan['username'] ?>">
                        <div class="invalid-feedback">
                            Username Belum diisi!
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-7 col-12">
                        <div class="col-sm-3">
                            <img class="img-thumbnail" src="<?= base_url('assets/img/pelanggan/') . $pelanggan['foto'] ?>" alt="">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" name="gambar" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-5 col-12">
                        <label>Alamat</label>
                        <input type="hidden" name="old_image" value="<?= $pelanggan['foto'] ?>">
                        <textarea name="alamat" id="" cols="30" class="form-control" rows="10"><?= $pelanggan['alamat'] ?></textarea>
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
                        <input type="text" id="latitude" readonly value="<?= $pelanggan['pelanggan_lat'] ?>" name="lat" autocomplete="off" class="form-control">
                    </div>
                    <div class="form-group col-md-5">
                        <label>Longitude</label>
                        <input type="text" id="longitude" value="<?= $pelanggan['pelanggan_long'] ?>" readonly name="long" autocomplete="off" class="form-control">
                    </div>
                </div>
                <div class="float-right">
                    <button class="btn btn-primary">Ubah Profile</button>
                </div>
                <br><br>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    var lat = document.getElementById("latitude").value;
    var lng = document.getElementById("longitude").value;
    console.log(lat)

    function updateMarkerPosition(latLng) {
        document.getElementById('latitude').value = [latLng.lat()];
        document.getElementById('longitude').value = [latLng.lng()];
    }

    var myOptions = {
        zoom: 10,
        scaleControl: true,
        center: new google.maps.LatLng(-6.815344, 110.846005),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    var map = new google.maps.Map(document.getElementById("map"),
        myOptions);


    var marker1 = new google.maps.Marker({
        position: new google.maps.LatLng(lat, lng),
        title: 'Rumah Saya',
        map: map,
        draggable: true
    });

    //updateMarkerPosition(latLng);

    google.maps.event.addListener(marker1, 'drag', function() {
        updateMarkerPosition(marker1.getPosition());
    });
</script>