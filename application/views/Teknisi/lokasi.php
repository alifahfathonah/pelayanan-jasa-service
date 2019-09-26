<input type="hidden" value="<?= $surat['pelanggan_lat'] ?>" id="latitude">
<input type="hidden" value="<?= $surat['pelanggan_long'] ?>" id="longitude">
<div id="map" data-height="400"></div>
<script type="text/javascript">
    $(document).ready(function() { //event pada saat document telah selesai loadingnya
        cekTeknisi();
    })

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