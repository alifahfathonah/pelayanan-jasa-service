<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 id="judul">Isikan Data Keluhan</h4>
            </div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data" action="<?= base_url('_pelanggan/keluhan') ?>">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Barang Elektronik</label>
                            <input type="hidden" name="id" value="<?= $this->fungsi->kode_keluhan() ?>">
                            <select required name="id_be" class="form-control select2">
                                <option value=""> -- Pilih --</option>
                                <?php foreach ($be as $be) : ?>
                                    <option value="<?= $be['id_barangelektronik'] ?>"><?= $be['nama_barang'] . " " . $be['type'] . " - " . $be['nama_authorized'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div style="font-size: smaller" id='eror'>*) selain merk daikin & sanken pilih merk random</div>
                        </div>
                        <div class="form-group col-md-5">
                            <label>Seri</label>
                            <input type="text" name="seri" value="<?= set_value('seri') ?>" autocomplete="off" class="form-control">
                            <?= form_error('seri') ?>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label>Keluhan</label>
                            <textarea name="keluhan" id="" cols="35" class="form-control" rows="20"><?= set_value('keluhan') ?></textarea>
                            <?= form_error('keluhan') ?>
                        </div>
                        <div class="form-group col-md-5">
                            <label>Garansi</label>
                            <select name="garansi" id="garansi" class="form-control selectric">
                                <option value="">-- Pilih --</option>
                                <option value="ya">Ya</option>
                                <option value="tidak">Tidak</option>
                            </select>
                            <div style="font-size: smaller" id='eror'>*) hanya menerima garansi dari produk daikin & sanken</div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <div class="custom-file" id="fGaransi">
                                <input type="file" name="gambar" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <center>
                        <button type="submit" class="btn btn-primary">
                            Simpan
                        </button>
                    </center>
                </form>
            </div>
        </div>
    </div>
</div>