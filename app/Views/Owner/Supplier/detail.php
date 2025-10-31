<?php $this->extend("Layout/templates") ?>
<?php $this->section("content") ?>
<!--begin::App Content Header-->
<div class="app-content-header">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6"><h3 class="mb-0">Beli Barang</h3></div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Beli Barang</li>
            </ol>
            </div>
        </div>
        <!--end::Row-->
    </div>
    <div class="container">
        <div class="p-3 bg-white mt-3">
            <div class="row">
                <div class="col-lg-8">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th>Kode Barang</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; foreach($products as $product) : ?>
                                <tr class="align-middle">
                                    <td style="width: 10px"><?= $i; ?></td>
                                    <td><?= $product["kode_product"] ?></td>
                                    <td><?= $product["name"] ?></td>
                                    <td>Rp. <?= number_format($product["price_buy"]) ?></td>
                                    <td><?= $product["categori"] ?></td>
                                    <td>
                                        <form action="" method="post" class="d-inline border-0">
                                            <?= csrf_field() ?>
                                            <div class="row">
                                                <div class="col-8">
                                                    <input type="hidden" name="kode_product" value="<?= $product["kode_product"] ?>"/>
                                                    <input type="hidden" name="status" value="belum dikonfirmasi">
                                                    <input type="number" placeholder="QTY" class="form-control" name="qty" required/>
                                                    <input type="hidden" class="form-control" name="kode_supplier" value="<?= $product["supplier"] ?>"/>
                                                    <input type="hidden" class="form-control" name="price_buy" value="<?= $product["price_buy"] ?>"/>
                                                </div>
                                                <div class="col-4">
                                                    <button type="submit" class="border-0 my-1 btn btn-sm btn-primary"><i class="bi bi-cart"></i> Beli</button>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            <?php $i++; endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-4">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th>Nama Barang</th>
                                <th>QTY</th>
                                <th>Total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total = 0; $i = 1; foreach($carts as $cart) : ?>
                                <tr class="align-middle">
                                    <td style="width: 10px"><?= $i; ?></td>
                                    <td><?= $cart["name"] ?></td>
                                    <td><?= $cart["qty"] ?></td>
                                    <td>Rp. <?= number_format($cart["price_buy"] * $cart["qty"]) ?></td>
                                    <td>
                                        <form action="<?= base_url("") ?>hapuspesanan/<?= $cart['id'] ?>/<?= $cart['kode_supplier'] ?>" method="post" class="d-inline">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="border-0 my-1 btn btn-sm btn-danger tombol-hapus"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                <?php $total += $cart["price_buy"] * $cart["qty"];  $i++; endforeach; ?>
                                <tr>
                                    <td colspan="3">Total</td>
                                    <td colspan="2">Rp. <?= number_format($total) ?></td>
                                </tr>
                            <?php if(!empty($carts)) : ?>
                                <form action="" method="post">
                                    <input type="hidden" name="kode_pembelian" value="<?= $carts[0]['kode_pembelian'] ?>">
                                    <input type="hidden" name="status" value="pemesanan">
                                    <input type="hidden" name="total" value="<?= $total ?>">
                                    <tr>
                                        <td colspan="4"><input type="number" class="form-control" placeholder="Nominal Pembayaran" name="paid_off"/></td>
                                        <td><button type="submit" class="border-0 btn btn btn-primary">Selesai</button></td>
                                    </tr>
                                </form>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--end::Container-->
</div>
<!--end::App Content Header-->
<!--begin::App Content-->
<div class="app-content">
    <!--begin::Container-->
    <div class="container">
    
    </div>
    <!--end::Container-->
</div>
<!--end::App Content-->
<?php $this->endSection() ?>