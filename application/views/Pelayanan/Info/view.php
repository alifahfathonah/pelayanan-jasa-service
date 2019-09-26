<div class="table-responsive">
    <table id="tb" class="table table-striped table-md tabel-spk">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Surat</th>
                <th>Info</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($info as $key) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $key['id_surat'] ?></td>
                    <td><?= $key['info'] ?></td>
                    <td><?= $key['keterangan'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>