<?php $this->extend('Layout/templates') ?>
<?php $this->section('content') ?>

<div class="container-fluid">
    <div class="p-3 bg-white mt-3">
        <h4>Tambah Pengeluaran</h4>

        <?php if(isset($validation)): ?>
            <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
        <?php endif; ?>

        <form action="<?= base_url('pengeluaran') ?>" method="post">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label class="form-label">Tipe</label>
                <input type="text" name="type" class="form-control" value="<?= set_value('type') ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="description" class="form-control"><?= set_value('description') ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal</label>
                <input type="date" name="date" class="form-control" value="<?= set_value('date') ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Jumlah</label>
                <input type="number" name="amount" class="form-control" value="<?= set_value('amount') ?>" step="1">
            </div>

            <button class="btn btn-primary">Simpan</button>
            <a href="<?= base_url('pengeluaran') ?>" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>

<?php $this->endSection() ?>
