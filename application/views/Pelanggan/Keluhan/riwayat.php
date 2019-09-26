<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h6 id="judul">Keluhan Menunggu Konfirmasi</h6>
                <?php if ($this->session->userdata('id_pelanggan')) { ?>
                    <?php foreach ($konfirmasi as $kon) : ?>
                        <?php if ($kon['konfirmasi'] == "belum") { ?>
                            <div class="card bg-warning text-white card-primary">
                                <div class="card-header">
                                    <h4><?= $kon['id_keluhan'] . " - " . tgl_indo($kon['tgl_keluhan']) ?></h4>
                                </div>
                                <div class="card-body">
                                    <table>
                                        <tr>
                                            <td>
                                                <h6>Barang Elektronik</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="ml-2"> : <?= $kon['nama_barang'] . " - " . $kon['type'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><br></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h6>Merk</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> : <?= $kon['nama_authorized'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><br></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h6>Keluhan</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> : <?= $kon['keluhan'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><br></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h6>Status Keluhan</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p class="badge badge-pill badge-info mb-1">
                                                    <?= $kon['konfirmasi'] == 'belum' ? 'Tunggu Konfirmasi' : ($kon['konfirmasi'] == "sudah" ? 'Keluhan sudah dikonfirmasi' : 'Keluhan anda ditolak') ?>
                                                </p>
                                            </td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                        <?php } ?>
                    <?php endforeach ?>
                <?php } ?>
                <?php if ($this->session->userdata('id_pelanggan')) { ?>
                    <?php foreach ($konfirmasi as $kon) : ?>
                        <?php
                        $query = "SELECT * FROM tb_keluhan WHERE id_keluhan='$kon[id_keluhan]' NOT IN (SELECT id_keluhan FROM tb_suratperintahkerja)";
                        $cek = $this->db->query($query)->num_rows();
                        if ($kon['konfirmasi'] == "sudah" && $cek == 0) { ?>
                            <div class="card bg-warning text-white card-primary">
                                <div class="card-header">
                                    <h4><?= $kon['id_keluhan'] . " - " . tgl_indo($kon['tgl_keluhan']) ?></h4>
                                </div>
                                <div class="card-body">
                                    <table>
                                        <tr>
                                            <td>
                                                <h6>Barang Elektronik</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="ml-2"> : <?= $kon['nama_barang'] . " - " . $kon['type'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><br></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h6>Merk</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> : <?= $kon['nama_authorized'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><br></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h6>Keluhan</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> : <?= $kon['keluhan'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><br></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h6>Status Keluhan</h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p class="badge badge-pill badge-info mb-1">
                                                    <?= $kon['konfirmasi'] == 'belum' ? 'Tunggu Konfirmasi' : ($kon['konfirmasi'] == "sudah" ? 'Keluhan sudah dikonfirmasi' : 'Keluhan anda ditolak') ?>
                                                </p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        <?php } ?>
                    <?php endforeach ?>
                <?php } ?>
                <br><br>
                <h6>Riwayat Keluhan</h6>
                <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="#nav-keluhan" role="tab" aria-controls="nav-home" aria-selected="true">Keluhan Ditolak</a>
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Dalam Proses</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Selesai</a>
                    </div>
                </nav>
                <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade" id="nav-keluhan" role="tabpanel" aria-labelledby="nav-home-tab">
                        <?php if ($this->session->userdata('id_pelanggan')) { ?>
                            <?php foreach ($tolak as $tolak) : ?>
                                <?php if ($tolak['konfirmasi'] != 'sudah') { ?>
                                    <div class="card bg-danger text-white card-primary">
                                        <div class="card-header">
                                            <h4><?= $tolak['id_keluhan'] . " - " . tgl_indo($tolak['tgl_keluhan']) ?></h4>
                                        </div>
                                        <div class="card-body">
                                            <table>
                                                <tr>
                                                    <td>
                                                        <h6>Barang Elektronik</h6>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="ml-2"> : <?= $tolak['nama_barang'] . " - " . $tolak['type'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td><br></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6>Merk</h6>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> : <?= $tolak['nama_authorized'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td><br></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6>Keluhan</h6>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> : <?= $tolak['keluhan'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td><br></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6>Status Keluhan</h6>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p class="badge badge-pill badge-info mb-1">
                                                            <?= $tolak['konfirmasi'] == 'belum' ? 'Tunggu Konfirmasi' : ($tolak['konfirmasi'] == "sudah" ? 'Keluhan sudah dikonfirmasi' : 'Keluhan anda ditolak') ?>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><br></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6>Keterangan</h6>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p class="badge badge-pill badge-info mb-1">
                                                            <?= $tolak['ket_konfirmasi'] ?>
                                                        </p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php endforeach ?>
                        <?php } else { ?>
                            Anda Belum Login! Silahkan Login untuk mengetahui riwayat keluhan anda!
                        <?php } ?>
                    </div>
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <?php if ($this->session->userdata('id_pelanggan')) { ?>
                            <?php foreach ($belum as $no) : ?>
                                <?php if ($no['status_service'] != 'selesai') { ?>
                                    <div class="card bg-primary text-white card-primary">
                                        <div class="card-header">
                                            <h4><?= $no['id_keluhan'] . " - " . tgl_indo($no['tgl_keluhan']) ?></h4>
                                        </div>
                                        <div class="card-body">
                                            <table width='100%'>
                                                <tr>
                                                    <td>
                                                        <h6>Barang Elektronik</h6>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="ml-2"> : <?= $no['nama_barang'] . " - " . $no['type'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td><br></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6>Merk</h6>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> : <?= $no['nama_authorized'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td><br></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6>Keluhan</h6>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td> : <?= $no['keluhan'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td><br></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h6>Status Keluhan</h6>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p class="badge badge-pill badge-info mb-1">
                                                            <?= $no['konfirmasi'] == 'belum' ? 'Tunggu Konfirmasi' : ($no['konfirmasi'] == "sudah" ? 'Keluhan sudah dikonfirmasi' : 'Keluhan anda ditolak') ?>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><br></td>
                                                </tr>
                                            </table>
                                            <?php if ($no['status_service'] == 'belum' || $no['status_service'] == 'otw' || $no['status_service'] == 'setengah' || $no['status_service'] == 'selesai') { ?>
                                                <a href="<?= base_url('_pelanggan/keluhan/keluhan_progress/' . $no['id_keluhan']) ?>" class="float-right btn btn-danger mt-2">Status Service</a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php endforeach ?>
                        <?php } else { ?>
                            Anda Belum Login! Silahkan Login untuk mengetahui riwayat keluhan anda!
                        <?php } ?>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <?php if ($this->session->userdata('id_pelanggan')) { ?>
                            <?php foreach ($sudah as $yes) : ?>
                                <div class="card bg-primary text-white card-primary">
                                    <div class="card-header">
                                        <h4><?= $yes['id_keluhan'] . " - " . tgl_indo($yes['tgl_keluhan']) ?></h4>
                                    </div>
                                    <div class="card-body">
                                        <table>
                                            <tr>
                                                <td>
                                                    <h6>Barang Elektronik</h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="ml-2"> : <?= $no['nama_barang'] . " - " . $no['type'] ?></td>
                                            </tr>
                                            <tr>
                                                <td><br></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h6>Merk</h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> : <?= $no['nama_authorized'] ?></td>
                                            </tr>
                                            <tr>
                                                <td><br></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h6>Keluhan</h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> : <?= $no['keluhan'] ?></td>
                                            </tr>
                                            <tr>
                                                <td><br></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h6>Status Keluhan</h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class="badge badge-pill badge-info">
                                                        <?= $yes['status_service'] == 'belum' ? 'Belum Dikerjakan' : ($yes['status_service'] == "otw" ? 'Teknisi menuju ke lokasi' : ($yes['status_service'] == "setengah" ? 'Teknisi meservice barang ke harco' : 'Service telah selesai')) ?>
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><br></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h6>Hasil Service</h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> : <?= $yes['hasil'] ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><br></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h6>Status Bayar</h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class="badge badge-pill badge-info">
                                                        <?= $yes['status_bayar'] == 'belum' ? 'Belum Bayar' : 'Sudah Bayar' ?>
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><br></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h6>Total Bayar</h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p class="badge badge-pill badge-danger">
                                                        <?= $yes['total_bayar'] == null ? '-' : 'Rp . ' . number_format($yes['total_bayar'], 2, ",", ".") ?>
                                                    </p>
                                                </td>
                                            </tr>
                                        </table>
                                        <?php if ($no['status_service'] == 'selesai' && $no['status_bayar'] == 'sudah') { ?>
                                            <a href="<?= base_url('_pelanggan/keluhan/rincian/' . $no['id_keluhan']) ?>" class="float-right btn btn-danger mt-2">Rincian Pembayaran</a>
                                        <?php } ?>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        <?php } else { ?>
                            Anda Belum Login! Silahkan Login untuk mengetahui riwayat keluhan anda!
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>