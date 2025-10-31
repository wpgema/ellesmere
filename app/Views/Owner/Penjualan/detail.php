<?php $this->extend("Layout/templates") ?>
<?php $this->section("content") ?>
<!--begin::App Content Header-->
<div class="app-content-header">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6"><h3 class="mb-0">Detail Penjualan</h3></div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>penjualan">Penjualan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail Penjualan</li>
            </ol>
            </div>
        </div>
        <!--end::Row-->
    </div>
    <div class="container">
        <div class="p-3 bg-white mt-3">
            <?php if($sales) : ?>
                <h6 class="fw-semibold">Nama : <?= $sales[0]["customer_name"] ?></h6>
                <h6 class="fw-semibold">Telp : <?= $sales[0]["telp"] ?></h6>
                <h6 class="fw-semibold">Tanggal : <?php $sales[0]["transaksi_date"]; $date = new DateTime($sales[0]["transaksi_date"]); echo $date->format('d-m-Y');  ?></h6>
                <h6 class="fw-semibold">Jam : <?php $sales[0]["created_at"]; $date = new DateTime($sales[0]["created_at"]); echo $date->format('H.i.s');  ?></h6>
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
                                    <td colspan="2">Total Harga</td>
                                    <td>Rp. <?= number_format($sales[0]["total_price"]) ?></td>
                                </tr>
                                <tr class="align-middle">
                                    <td colspan="2"></td>
                                    <td>
                                        <a href="<?= base_url() ?>struk/<?= $sales[0]["kode_penjualan"] ?>" class="btn btn-sm btn-primary">Cetak Struk</a>
                                        &nbsp;
                                        <form action="<?= base_url('penjualan/' . $sales[0]['kode_penjualan']) ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus penjualan ini? Ini akan menghapus juga detail penjualan.');">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
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
                                    <td colspan="4">Total Harga</td>
                                    <td>Rp. <?= number_format($sales[0]["total_price"]) ?></td>
                                </tr>
                                <tr class="align-middle">
                                    <td colspan="4"></td>
                                    <td>
                                        <a href="<?= base_url() ?>struk/<?= $sales[0]["kode_penjualan"] ?>" class="btn btn-sm btn-primary">Cetak Struk</a>
                                        &nbsp;
                                        <form action="<?= base_url('penjualan/' . $sales[0]['kode_penjualan']) ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus penjualan ini? Ini akan menghapus juga detail penjualan.');">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
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