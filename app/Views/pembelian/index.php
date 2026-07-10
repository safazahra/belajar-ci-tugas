<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<h4>Pembelian</h4>

<table class="table datatable">
    <thead>
        <tr>
            <th>ID Pembelian</th>
            <th>Pembeli</th>
            <th>Waktu Pembelian</th>
            <th>Total Bayar</th>
            <th>Alamat</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
    <?php foreach ($transactions as $item) : ?>
    <tr>

        <td><?= $item['id'] ?></td>

        <td><?= $item['username'] ?></td>

        <td><?= $item['created_at'] ?></td>

        <td><?= number_to_currency($item['total_harga'], 'IDR') ?></td>

        <td><?= $item['alamat'] ?></td>

        <td>

            <?php if($item['status']==0): ?>

                <span class="badge bg-warning">
                    Belum Selesai
                </span>

            <?php else: ?>

                <span class="badge bg-primary">
                    Sudah Selesai
                </span>

            <?php endif; ?>

        </td>

        <td>

            <a href="#"
            class="btn btn-success btn-sm"
            data-bs-toggle="modal"
            data-bs-target="#detail<?= $item['id'] ?>">
                Detail
            </a>

            <a href="<?= base_url('pembelian/status/' . $item['id']) ?>"
            class="btn btn-info btn-sm">
                Ubah Status
            </a>
        </td>

    </tr>
    <?php endforeach ?>
    </tbody>    
</table>

<?php foreach ($transactions as $item) : ?>

<div class="modal fade" id="detail<?= $item['id'] ?>" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">
                    Detail Transaksi #<?= $item['id'] ?>
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>
            </div>

            <div class="modal-body">

                <?php
                if(isset($products[$item['id']])):
                    foreach($products[$item['id']] as $index=>$produk):
                ?>

                <p><?= $index+1 ?>)</p>

                <img src="<?= base_url('img/'.$produk['foto']) ?>"
                     width="80">

                <br>

                <b><?= $produk['nama'] ?></b>

                IDR <?= number_format($produk['harga'],0,',','.') ?>

                <br>

                (<?= $produk['jumlah'] ?> pcs)

                <br>

                IDR <?= number_format($produk['subtotal_harga'],0,',','.') ?>

                <hr>

                <?php endforeach; endif; ?>

                Ongkir
                IDR <?= number_format($item['ongkir'],0,',','.') ?>

            </div>

        </div>
    </div>
</div>

<?php endforeach; ?>

<?= $this->endSection() ?>