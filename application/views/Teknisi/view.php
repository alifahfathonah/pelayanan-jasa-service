<div class="table-responsive">
    <table class="table table-striped table-hover table-md">
        <tr>
            <th data-width="40">No</th>
            <th class="text-center">Aksi</th>
            <th>Sparepart</th>
            <th class="text-center">Harga</th>
            <th class="text-center">Jumlah</th>
            <th class="text-right">Total</th>
        </tr>
        <?php
        $no = 1;
        if ($jumlahData > 0) {
            foreach ($detail as $k) :
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td class="text-center">
                        <a href="javascript:void()" data-id="<?php echo $k['id_detail']; ?>" class="btn btn-danger hapus-detail"><i class="fa fa-trash"></i></a>
                    </td>
                    <td><?= $k['id_sparepart'] ?></td>
                    <td class="text-center">$10.99</td>
                    <td class="text-center"><?= $k['jumlah'] ?></td>
                    <td class="text-right">$10.99</td>
                </tr>
            <?php endforeach;
    } else {
        ?>
            <tr>
                <td colspan="5">Tidak ada data</td>
            </tr>
        <?php } ?>
    </table>
</div>