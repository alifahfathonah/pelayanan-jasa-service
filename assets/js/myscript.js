var base_url = 'http://localhost/service-harco/'
$(document).ready(function () {
    $('#formPemohon').hide()
    $('#formAlamat').hide()
    $('#formNo').hide()
    $('#fGaransi').hide()
    $('#tb').DataTable({
        // "paging": true,
        "ordering": false,
        "autoWidth": false,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Indonesian.json",
            "sEmptyTable": "Tidak ada database"
        }
    });

    // $('#tgl').datepicker()


    $('#kirim').on('show.bs.modal', function (e) {
        console.log($(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href')))
    });

    $('.modal-body #konfirm').change(function () {
        if ($(this).val() == "sudah") {
            // console.log('ok')
            $('#ket_konfirmasi').attr('disabled', 'disabled')
        } else {
            // console.log('okasa')
            $('#ket_konfirmasi').removeAttr('disabled', 'disabled')
        }
    })

    $('.info').on('click', function () {
        var id = $(this).data('id')
        $('#input-id').val(id)
    })

    $('.custom-file-input').on('change', function () {
        let gambar = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass('selected').html(gambar);
    });

    $("#belum").on('click', function () {
        var id = $(this).data('id')
        console.log(id)
        $.ajax({
            url: base_url + '_teknisi/surat/ubah',
            type: 'GET',
            data: { id: id },
            success: function () {
                window.location.href = base_url + '_teknisi/surat'
            }
        })
    })

    $("#selesai").on('click', function () {
        var id = $(this).data('id')
        $.ajax({
            url: base_url + '_teknisi/surat/ubahSelesai',
            type: 'GET',
            data: { id: id },
            success: function (repsonse) {
                window.location.href = repsonse
            }
        })
    })

    $("#selesai2").on('click', function () {
        var id = $(this).data('id')
        console.log(id)
        $.ajax({
            url: base_url + '_teknisi/surat/ubahSelesai2',
            type: 'GET',
            data: { id: id },
            success: function (repsonse) {
                window.location.href = repsonse
            }
        })
    })

    $('#pilih').on('change', function () {
        var id = $(this).val()
        if (id == '1') {
            $('#formPemohon').show()
            $('#pemohon').val('Call Center').attr('readonly', 'readonly')
            $('#formAlamat').show()
            $('#alamat_p').val('Semarang').attr('readonly', 'readonly')
            $('#formNo').show()
            $('#no_p').val('(0291) 9189').attr('readonly', 'readonly')
        } else {
            $('#formPemohon').show()
            $('#pemohon').val('').removeAttr('readonly', 'readonly')
            $('#formAlamat').show()
            $('#alamat_p').val('').removeAttr('readonly', 'readonly')
            $('#formNo').show()
            $('#no_p').val('').removeAttr('readonly', 'readonly')
        }
    })

    $('#garansi').on('change', function () {
        var id = $(this).val();
        if (id == 'ya') {
            $('#fGaransi').show()
        } else {
            $('#fGaransi').hide()
        }
    })

    $('#cekService').on('click', function () {
        var tgl = $('#tglService').val();
        var teknisi = $('#teknisiService').val();
        var kota = $('#kotaService').val();
        $.ajax({
            url: base_url + 'surat/cek',
            type: 'POST',
            data: { tgl: tgl, teknisi: teknisi, kota: kota },
            dataType: 'json',
            success: function (hasil) {
                $('#dataService').html(hasil.isi)
            }
        })
    })
})

function reset() {
    $('[type = text]').val('');
    $('[name = ket]').val('')
}