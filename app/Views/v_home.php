<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<?php
if (session()->getFlashData('success')) {
?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashData('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
}
?>

<!-- Table with stripped rows -->
<div class="row">
    <?php foreach ($products as $key => $item) : ?>         
            <div class="col-lg-6">
                <?= form_open('keranjang') ?>
                <?php
                echo form_hidden('id', $item['id']);
                echo form_hidden('nama', $item['nama']);
                echo form_hidden('harga', $item['harga']);
                echo form_hidden('foto', $item['foto']);
                ?>

                <div class="card">
                    <div class="card-body">
                        <img src="<?= base_url() . "img/" . $item['foto'] ?>" alt="..." width="50%">
                        
                            <?php
                            $hargaAkhir = $item['harga'];

                            if ($discount) {
                                $hargaAkhir = max(0, $item['harga'] - $discount['nominal']);
                            }
                            ?>

                            <h5 class="card-title">
                            <?= $item['nama'] ?><br>

                            <?php if ($discount) : ?>

                                <del style="color:#dc3545;font-size:15px;font-weight:400;">
                                    IDR <?= number_format($item['harga'], 0, '.', ',') ?>
                                </del>

                                <span style="margin-left:5px;color:#012970;font-size:15px;font-weight:500;">
                                    IDR <?= number_format($hargaAkhir, 0, '.', ',') ?>
                                </span>

                            <?php else : ?>

                                <span style="color:#012970;font-size:15px;font-weight:400;">
                                    IDR <?= number_format($item['harga'], 0, '.', ',') ?>
                                </span>

                            <?php endif; ?>
                        </h5>

                        <button type="submit" class="btn btn-info rounded-pill">Beli</button>
                    </div>
                </div>
                <?= form_close() ?>
            </div> 
    <?php endforeach ?> 
</div>
<!-- End Table with stripped rows -->
<?= $this->endSection() ?>