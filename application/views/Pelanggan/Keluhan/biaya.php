<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Perkiraan Biaya</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="tb">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Keterangan</th>
                                <th>Biaya</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($biaya as $by) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $by['keterangan'] ?></td>
                                    <td>Rp. <?= number_format($by['harga'], 2, ", ", ".") ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>