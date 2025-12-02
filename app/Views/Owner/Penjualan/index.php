<?php $this->extend("Layout/templates") ?>
<?php $this->section("content") ?>
<!--begin::App Content Header-->
<div class="app-content-header">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6"><h3 class="mb-0">Daftar Penjualan</h3></div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Daftar Penjualan</li>
            </ol>
            </div>
        </div>
        <!--end::Row-->
    </div>
    <div class="container-fluid">
            <div class="p-3 bg-white mt-3">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 10px">No</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Nama</th>
                        <th>Telp/Hp</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = isset($start) ? $start : 1; foreach($customers as $customer) : ?>
                        <tr class="align-middle">
                            <td style="width: 10px"><?= $i; ?></td>
                            <td><?php $customer["created_at"]; $date = new DateTime($customer["created_at"]); echo $date->format('d-m-Y');  ?></td>
                            <td><?php $customer["created_at"]; $date = new DateTime($customer["created_at"]); echo $date->format('H.i.s');  ?></td>
                            <td><?= $customer["customer_name"] ?></td>
                            <td><?= $customer["telp"] ?></td>
                            <td>Rp. <?= number_format($customer["total_price"]) ?></td>
                            <td>
                                <a href="<?= base_url("") ?>penjualan/<?= $customer['kode_penjualan'] ?>" class="btn btn-sm btn-primary">Detail Transaksi</a>
                            </td>
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