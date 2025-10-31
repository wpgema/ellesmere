<?php $this->extend("Layout/templates") ?>
<?php $this->section("content") ?>
<!--begin::App Content Header-->
<div class="app-content-header">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6"><h3 class="mb-0">Kasir</h3></div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Kasir</li>
            </ol>
            </div>
        </div>
        <!--end::Row-->
    </div>
    <div class="container">
        <div class="p-3 bg-white mt-3">
            <div class="row">
                <div class="col-lg-8">
                    <?php if(session()->has("stok_habis")) : ?>
                        <p class="text-danger"><?= session()->get("stok_habis"); ?></p>
                        <?php session()->remove("stok_habis") ?>
                    <?php endif; ?>
                    <form action="" class="py-2" method="post">
                        <div class="row">
                            <div class="col-7 d-flex">
                                <input type="hidden" name="tipe" value="cari"/>
                                <input type="text" class="form-control" placeholder="Cari Barang / Layanan" name="cari"/>
                                <button type="submit" class="btn btn-primary">Cari</button>
                            </div>
                        </div>
                    </form>
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; foreach($products as $product) : ?>
                                <tr class="align-middle">
                                    <td style="width: 10px"><?= $i; ?></td>
                                    <td><?= $product["name"] ?></td>
                                    <td>Rp. <?= number_format($product["price_sale"]) ?></td>
                                    <td>
                                        <form action="" method="post" class="d-inline border-0">
                                            <?= csrf_field() ?>
                                            <div class="row">
                                                <div class="col-8">
                                                    <input type="hidden" name="tipe" value="cart">
                                                    <input type="hidden" name="kode_product" value="<?= $product["kode_product"] ?>"/>
                                                    <input type="hidden" name="product" value="<?= $product["name"] ?>"/>
                                                    <input type="hidden" name="status" value="belum selesai">
                                                    <input type="hidden" name="jenis_pemesanan" value="booking offline">
                                                    <input type="number" class="form-control" placeholder="Jumlah" name="qty" required/>
                                                    <input type="hidden" class="form-control" name="product_price" value="<?= $product["price_sale"] ?>"/>
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
                                <th>Barang / Layanan</th>
                                <th>QTY</th>
                                <th>Total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total = 0; $i = 1; foreach($carts as $cart) : ?>
                                <tr class="align-middle">
                                    <td style="width: 10px"><?= $i; ?></td>
                                    <td><?= $cart["product"] ?></td>
                                    <td><?= $cart["qty"] ?></td>
                                    <td>Rp. <?= $cart["qty"] != 0 ?  number_format($cart["product_price"] * $cart["qty"]) : number_format($cart["product_price"]) ?></td>
                                    <td>
                                        <form action="<?= base_url("") ?>kasir/<?= $cart['id'] ?>" method="post" class="d-inline">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="border-0 my-1 btn btn-sm btn-danger tombol-hapus"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php $total += $cart["qty"] != 0 ? $cart["product_price"] * $cart["qty"] : $cart["product_price"];  $i++; endforeach; ?>
                            <tr>
                                <th colspan="4">Total</th>
                                <th>Rp. <?= number_format($total) ?></th>
                            </tr>
                            <?php if(!empty($carts)) : ?>
                                <form action="" method="post">
                                    <input type="hidden" name="tipe" value="konfirmasi">
                                    <input type="hidden" name="kode_penjualan" value="<?= $carts[0]['kode_penjualan'] ?>">
                                    <input type="hidden" name="total_product" value="<?= $total ?>">
                                    <input type="hidden" name="status" value="selesai">
                                    <tr>
                                        <?php if(empty($carts1[0]["customer_name"])) : ?>
                                            <td colspan="5"><input type="text" class="form-control" placeholder="Nama Pelanggan" name="customer_name"/></td>
                                        <?php else : ?>
                                            <td colspan="5"><input type="hidden" class="form-control" placeholder="Nama Pelanggan" name="customer_name" value="<?= $carts1[0]["customer_name"] ?>"/></td>
                                        <?php endif; ?>
                                    </tr>
                                    <tr>
                                        <?php if(empty($carts1[0]["telp"])) : ?>
                                            <td colspan="4"><input type="text" class="form-control" placeholder="Telp" name="telp"/></td>
                                        <?php else : ?>
                                            <td colspan="4"><input type="hidden" class="form-control" placeholder="Telp" name="telp" value="<?= $carts1[0]["telp"] ?>"/></td>
                                        <?php endif; ?>
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