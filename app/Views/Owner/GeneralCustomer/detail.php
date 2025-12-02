<?php $this->extend("Layout/templates") ?>
<?php $this->section("content") ?>
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6"><h3 class="mb-0">Detail Pelanggan </h3></div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>pelanggan-umum">Daftar Pelanggan </a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail Pelanggan </li>
            </ol>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="p-3 bg-white mt-3">
            <?php if($sales) : ?>
                <h6 class="fw-semibold">Nama : <?= $sales[0]["customer_name"] ?></h6>
                <h6 class="fw-semibold">Telp : <?= $sales[0]["telp"] ?></h6>
            <?php endif; ?>
            <?php if($sales) : ?>
                <?php if($sales[0]["kode_product"] == "jasa_servis") : ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th>Layanan</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; foreach($sales as $sale) : ?>
                                <tr class="align-middle">
                                    <td style="width: 10px"><?= $i; ?></td>
                                    <td><?= $sale["product"] ?></td>
                                    <td>Rp. <?= number_format($sale["product_price"]) ?></td>
                                </tr>
                            <?php $i++; endforeach; ?>
                            <?php if($sales) : ?>
                                <tr class="align-middle">
                                    <td colspan="2">Total Harga Servis</td>
                                    <td>Rp. <?= number_format($sales[0]["total_product"]) ?></td>
                                </tr>
                                <tr class="align-middle">
                                    <td colspan="2">Total Harga</td>
                                    <td>Rp. <?= number_format($sales[0]["total_price"]) ?></td>
                                </tr>
                                <tr class="align-middle">
                                    <td colspan="2"></td>
                                    <td>
                                        <a href="<?= base_url() ?>struk/<?= $sales[0]["kode_penjualan"] ?>" class="btn btn-sm btn-primary">Cetak Struk</a>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th>Barang</th>
                                <th>QTY</th>
                                <th>Harga</th>
                                <th>Sub Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; foreach($sales as $sale) : ?>
                                <tr class="align-middle">
                                    <td style="width: 10px"><?= $i; ?></td>
                                    <td><?= $sale["product"] ?></td>
                                    <td><?= $sale["qty"] ?></td>
                                    <td>Rp. <?= number_format($sale["product_price"]) ?></td>
                                    <td>Rp. <?= number_format($sale["sub_total"]) ?></td>
                                </tr>
                            <?php $i++; endforeach; ?>
                            <?php if($sales) : ?>
                                <tr class="align-middle">
                                    <td colspan="4">Total Harga Produk</td>
                                    <td>Rp. <?= number_format($sales[0]["total_product"]) ?></td>
                                </tr>
                                <tr class="align-middle">
                                    <td colspan="4">Total Harga Servis</td>
                                    <td>Rp. <?= number_format($sales[0]["total_service"]) ?></td>
                                </tr>
                                <tr class="align-middle">
                                    <td colspan="4">Total Harga</td>
                                    <td>Rp. <?= number_format($sales[0]["total_price"]) ?></td>
                                </tr>
                                <tr class="align-middle">
                                    <td colspan="4"></td>
                                    <td>
                                        <a href="<?= base_url() ?>struk/<?= $sales[0]["kode_penjualan"] ?>" class="btn btn-sm btn-primary">Cetak Struk</a>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
    <!--end::Container-->
</div>
<!--end::App Content Header-->
<?php $this->endSection() ?>