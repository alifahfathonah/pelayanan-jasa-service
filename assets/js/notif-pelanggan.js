function cekPelanggan() { //function untuk mengecek pesan 
    $.ajax({
        url: base_url + "_pelanggan/beranda/getJumlah", //script php untuk mengecek pesan, didalamnya berupa query select
        cache: false,
        dataType: 'json',
        success: function (msg) {
            console.log(msg.jumlah)
            if (msg.jumlah == 0) {
                $('.jumlahpel').hide()
                $(".infoNotif").html(msg.kosong);
            } else {
                $(".jumlahpel").show().html(msg.jumlah);
                $(".infoNotif").html(msg.kosong);

            }
        }
    });
    var waktu = setTimeout("cekTeknisi()", 2000);
}

// $(document).ready(function () { //event pada saat document telah selesai loadingnya
//     cekPelanggan();
// })