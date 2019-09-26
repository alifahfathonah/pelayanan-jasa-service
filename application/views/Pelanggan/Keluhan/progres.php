<section class="section">
    <div class="section-header">

    </div>
    <div class="section-body">
        <h2 class="section-title">Status Service</h2>
        <p class="section-lead">No. Keluhan : <?= $setengah['id_keluhan'] ?> <?= $otw['id_keluhan'] ?> <?= $belum['id_keluhan'] ?> <?= $selesai['id_keluhan'] ?></p>

        <div class="row">
            <div class="col-12">
                <div class="activities">
                    <?php if ($selesai) { ?>
                        <div class="activity">
                            <div class="activity-icon bg-primary text-white shadow-primary">
                                <i class="fas fa-check-double"></i>
                            </div>
                            <div class="activity-detail">
                                <div class="mb-2">
                                    <span class="text-job text-primary">Selesai Service</span>
                                    <span class="bullet"></span>
                                </div>
                                <p><?= $selesai['tgl'] ?></p>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if ($info['updated_info'] != "") { ?>
                        <div class="activity">
                            <div class="activity-icon bg-primary text-white shadow-primary">
                                <i class="fas fa-info"></i>
                            </div>
                            <div class="activity-detail">
                                <div class="mb-2">
                                    <span class="text-job">Info Jadwal Terbaru Klik </span>
                                    <span class="bullet"></span>
                                    <a class="text-job" href="#"><button data-toggle="modal" data-target="#infoterbaru<?= $info['id_info'] ?>" class="btn btn-sm btn-warning">detail</button></a>
                                </div>
                                <p><?= $selesai['tgl'] ?></p>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if ($setengah) { ?>
                        <div class="activity">
                            <div class="activity-icon bg-primary text-white shadow-primary">
                                <i class="fas fa-stopwatch"></i>
                            </div>
                            <div class="activity-detail">
                                <div class="mb-2">
                                    <span class="text-job">Belum selesai service</span>
                                    <span class="bullet"></span>
                                    <span class="text-job"><?= $setengah['ket_status'] ?></span>
                                </div>
                                <p><?= $setengah['tgl'] ?></p>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if ($otw || $setengah || $selesai) { ?>
                        <div class="activity">
                            <div class="activity-icon bg-primary text-white shadow-primary">
                                <i class="fas fa-shipping-fast"></i>
                            </div>
                            <div class="activity-detail">
                                <div class="mb-2">
                                    <span class="text-job">Teknisi sedang perjalanan ke lokasi anda</span>
                                    <span class="bullet"></span>
                                </div>
                                <p><?= $otw['tgl'] ?></p>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if ($info) { ?>
                        <div class="activity">
                            <div class="activity-icon bg-primary text-white shadow-primary">
                                <i class="fas fa-info"></i>
                            </div>
                            <div class="activity-detail">
                                <div class="mb-2">
                                    <span class="text-job">Info Jadwal Klik </span>
                                    <span class="bullet"></span>
                                    <a class="text-job" href="#"><button data-toggle="modal" data-target="#tampilNotifpelanggan<?= $info['id_info'] ?>" class="btn btn-sm btn-warning">detail</button></a>
                                </div>
                                <p><?= $selesai['tgl'] ?></p>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if ($belum || $otw || $setengah || $selesai) { ?>
                        <div class="activity">
                            <div class="activity-icon bg-primary text-white shadow-primary">
                                <i class="fas fa-check"></i>
                            </div>
                            <div class="activity-detail">
                                <div class="mb-2">
                                    <span class="text-job">Keluhan Anda Sudah Dikonfirmasi</span>
                                    <span class="bullet"></span>
                                </div>
                                <p><?= $selesai['tgl'] ?></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>


<?php foreach ($tampilSemua as $key) : ?>
    <div class="modal fade" id="tampilNotifpelanggan<?= $key['id_info'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Info Jadwal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <span for="nama" class="col-sm-3 col-form-label">Info Jadwal</span>
                        <div class="col-sm-9">
                            <input readonly class="form-control" type="text" value="<?= $key['info'] ?>" name="id" />
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


<?php foreach ($tampilSemua as $key) : ?>
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
                            <input readonly class="form-control" type="text" value="<?= $key['updated_info'] ?>" name="id" />
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