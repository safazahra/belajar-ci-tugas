<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<?php if (session()->getFlashdata('success')) : ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <?= session()->getFlashdata('success') ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')) : ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <?= session()->getFlashdata('error') ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
<?php endif; ?>

<a href="#" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
    Tambah Data
</a>

<table class="table datatable">
    <thead>
        <tr>
            <th width="5%">#</th>
            <th>Tanggal</th>
            <th>Nominal</th>
            <th width="20%">Aksi</th>
        </tr>
    </thead>

    <tbody>

    <?php $no=1; ?>

    <?php foreach($discounts as $item) : ?>

        <tr>

            <td><?= $no++ ?></td>

            <td><?= $item['tanggal'] ?></td>

            <td><?= $item['nominal'] ?></td>

            <td>
                <a href="#"
                class="btn btn-success btn-sm"
                data-bs-toggle="modal"
                data-bs-target="#modalEdit<?= $item['id'] ?>">
                    Ubah
                </a>

                <a href="<?= base_url('diskon/delete/'.$item['id']) ?>"
                class="btn btn-danger btn-sm"
                onclick="return confirm('Hapus data?')">
                    Hapus
                </a>
            </td>

        </tr>

    <?php endforeach ?>

    </tbody>

</table>

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <form action="<?= base_url('diskon/create') ?>" method="post">

                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <div class="mb-3">
                        <label>Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Nominal</label>
                        <input type="number" name="nominal" class="form-control" required>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Close
                    </button>

                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

<?php foreach ($discounts as $item) : ?>

<div class="modal fade" id="modalEdit<?= $item['id'] ?>" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <form action="<?= base_url('diskon/edit/'.$item['id']) ?>" method="post">

                <div class="modal-header">
                    <h5 class="modal-title">Edit Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <div class="mb-3">
                        <label>Tanggal</label>
                        <input type="date"
                               class="form-control"
                               value="<?= $item['tanggal'] ?>"
                               readonly>
                    </div>

                    <div class="mb-3">
                        <label>Nominal</label>
                        <input type="number"
                               name="nominal"
                               class="form-control"
                               value="<?= $item['nominal'] ?>"
                               required>
                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal">
                        Close
                    </button>

                    <button type="submit"
                            class="btn btn-primary">
                        Simpan
                    </button>

                </div>

            </form>

        </div>
    </div>
</div>

<?php endforeach; ?>

<?= $this->endSection() ?>