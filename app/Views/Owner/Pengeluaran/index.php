<?php $this->extend("Layout/templates") ?>
<?php $this->section("content") ?>
<div class="app-content-header">
    <div class="container">
        <div class="row">
            <div class="col-sm-6"><h3 class="mb-0">Daftar Pengeluaran</h3></div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Daftar Pengeluaran</li>
            </ol>
            </div>
        </div>
    </div>
    <div class="container">
            <div class="p-3 bg-white mt-3">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 10px">No</th>
                        <th>Tanggal</th>
                        <th>Pengeluaran</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = isset($start) ? $start : 1; foreach($expenditures as $expenditure) : ?>
                        <tr class="align-middle">
                            <td style="width: 10px"><?= $i; ?></td>
                            <td><?php $expenditure["created_at"]; $date = new DateTime($expenditure["created_at"]); echo $date->format('H.i.s');  ?></td>
                            <td><?= $expenditure["name"] ?></td>
                            <td><?= $expenditure["phone"] ?></td>
                            <td>Rp. <?= number_format($expenditure["total"]) ?></td>
                        </tr>
                    <?php $i++; endforeach; ?>
                </tbody>
            </table>

            <?php if(isset($pager) && $pager->getPageCount() > 1): ?>
                <div class="d-flex justify-content-end">
                    <?= $pager->links('default', 'adminlte_full'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $this->endSection() ?>