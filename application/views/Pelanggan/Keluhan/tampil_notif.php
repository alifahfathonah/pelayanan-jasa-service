<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 id="judul">Info Jadwal</h4>
            </div>
            <div class="card-body">
                <table class="table table-md mt-2">
                    <tr>
                        <td style="width:50px">No. Keluhan</td>
                        <td style="width:5px">:</td>
                        <td><b><?= $info['id_keluhan'] ?></b></td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        <td>:</td>
                        <td><b><?= $info['info'] ?></b></td>
                    </tr>
                    <tr>
                        <td>Keterangan</td>
                        <td>:</td>
                        <td><b><?= $info['keterangan'] ?></b></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>