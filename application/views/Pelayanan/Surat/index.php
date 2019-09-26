<section class="section">
    <div class="section-header">
        <h1>Surat Perintah Kerja</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#"></a>Transaksi</div>
            <div class="breadcrumb-item">Surat Perintah Kerja</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Surat Perintah Kerja</h2>

        <div class="row">
            <div class="col-12">
                <div class="card">

                    <?php $this->view('message'); ?>
                    <div class="card-body">
                        <div id="view-surat">
                            <?php $this->load->view('pelayanan/surat/view') ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php foreach ($info as $key) : ?>
    <div class="modal fade" id="infoterbaru<?= $key['id_info'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Info Jadwal Terbaru</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <span for="nama" class="col-sm-3 col-form-label">Info Jadwal</span>
                        <div class="col-sm-9">
                            <input readonly class="form-control" type="text" value="<?= tgl_indo($key['info']) ?>" name="id" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <span for="nama" class="col-sm-3 col-form-label">Keterangan</span>
                        <div class="col-sm-9">
                            <input readonly value="<?= $key['keterangan'] ?>" class="form-control" type="text" name="nama" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>