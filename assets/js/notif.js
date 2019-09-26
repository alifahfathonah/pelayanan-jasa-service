var base_url = "http://localhost/service-harco/";
function cek() { //function untuk mengecek pesan 
    $.ajax({
        url: base_url + "pelayanan/getJumlah", //script php untuk mengecek pesan, didalamnya berupa query select
        cache: false,
        dataType: 'json',
        success: function (msg) {
            console.log(msg.jumlah)
            if (msg.jumlah == 0) {
                $('.jumlah').hide()
                $(".infoNotif").html(msg.kosong);
            } else {
                $(".jumlah").show().html(msg.jumlah);
                $(".infoNotif").html(msg.kosong);

            }
        }
    });
    var waktu = setTimeout("cek()", 2000);
}

function cekTeknisi() { //function untuk mengecek pesan 
    $.ajax({
        url: base_url + "_teknisi/beranda/getJumlah", //script php untuk mengecek pesan, didalamnya berupa query select
        cache: false,
        dataType: 'json',
        success: function (msg) {
            console.log(msg.jumlah)
            if (msg.jumlah == 0) {
                $('.jumlah').hide()
                $(".infoNotif").html(msg.kosong);
            } else {
                $(".jumlah").show().html(msg.jumlah);
                $(".infoNotif").html(msg.kosong);

            }
        }
    });
    var waktu = setTimeout("cekTeknisi()", 2000);
}

function cekPimpinan() { //function untuk mengecek pesan 
    $.ajax({
        url: base_url + "_pimpinan/beranda/getJumlah", //script php untuk mengecek pesan, didalamnya berupa query select
        cache: false,
        dataType: 'json',
        success: function (msg) {
            console.log(msg.jumlah)
            if (msg.jumlah == 0) {
                $('.jumlah').hide()
                $(".infoNotif").html(msg.kosong);
            } else {
                $(".jumlah").show().html(msg.jumlah);
                $(".infoNotif").html(msg.kosong);

            }
        }
    });
    var waktu = setTimeout("cekPimpinan()", 2000);
}


