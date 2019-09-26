<?php if ($this->session->userdata('id_pelanggan')) { ?>
    <div class="col-12 col-sm-12 col-lg-5">
        <div class="card profile-widget">
            <div class="profile-widget-header">
                <img alt="image" src="<?= base_url('assets/img/pelanggan/') . $pelanggan['foto'] ?>" class="rounded-circle profile-widget-picture">
                <div class="profile-widget-items">
                    <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Member Sejak</div>
                        <div class="profile-widget-item-value"><?= date('d F Y', $pelanggan['dateCreated']) ?></div>
                    </div>
                    <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Jenis Kelamin</div>
                        <div class="profile-widget-item-value">
                            <?php if ($pelanggan['jekel'] == 'laki-laki') { ?>
                                <i class="fas fa-male"></i></span>
                            <?php } else { ?>
                                <i class="fas fa-female"></i></span>
                            <?php } ?>
                        </div>
                    </div>

                </div>
            </div>
            <div class="profile-widget-description pb-0">
                <div class="profile-widget-name"><?= $pelanggan['nama_pelanggan'] ?><div class="text-muted d-inline font-weight-normal">
                        <div class="slash"></div> <?= $pelanggan['no_telp'] ?>
                    </div>
                </div>
                <p><i class="fas fa-home"></i> </span><?= $pelanggan['alamat'] ?></p>
                <div id="map-canvas" style="height:350px;"></div>
            </div>
        </div>
    </div>
<?php } else { ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 id="judul">Maaf Anda tidak punya profile, Silahkan Login!</h4>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<script>
    function initialize() {
        var myLatlng = new google.maps.LatLng(<?= $pelanggan['pelanggan_lat'] ?>, <?= $pelanggan['pelanggan_long'] ?>);
        var mapOptions = {
            zoom: 15,
            center: myLatlng
        };

        var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

        var contentString = '<div id="content">' +
            '<div id="siteNotice">' +
            '</div>' +
            '<h1 id="firstHeading" class="firstHeading">Rumah Saya</h1>' +
            '</div>' +
            '</div>';

        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });

        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            title: 'Maps Info',
        });
        google.maps.event.addListener(marker, 'click', function() {
            infowindow.open(map, marker);
        });
    }

    google.maps.event.addDomListener(window, 'load', initialize);
</script>