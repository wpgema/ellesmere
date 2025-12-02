<?php $this->extend("Layout/templates") ?>
<?php $this->section("content") ?>
<!--begin::App Content Header-->
<div class="app-content-header">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6"><h3 class="mb-0">Daftar Pelanggan</h3></div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Daftar Pelanggan</li>
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
                        <th>Nama</th>
                        <th>Telp/Hp</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; foreach($customers as $customer) : ?>
                        <?php if(!$customer["customer_name"]) : ?>
                        <?php else : ?>
                            <tr class="align-middle">
                                <td style="width: 10px"><?= $i; ?></td>
                                <td><?= $customer["customer_name"] ?></td>
                                <td><?= $customer["telp"] ?></td>
                                <td>
                                    <a href="<?= base_url("") ?>pelanggan-umum/<?= $customer['kode_penjualan'] ?>" class="btn btn-sm btn-primary">Detail Transaksi</a>
                                </td>
                            </tr>
                        <?php $i++; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!--end::Container-->
</div>
<!--end::App Content Header-->
<?php $this->endSection() ?>