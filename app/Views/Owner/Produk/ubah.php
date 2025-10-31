<?php $this->extend("Layout/templates") ?>
<?php $this->section("content") ?>
<!--begin::App Content Header-->
<div class="app-content-header">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6"><h3 class="mb-0">Produk / Layanan</h3></div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="<?= base_url("produk") ?>">Produk / Layanan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ubah</li>
            </ol>
            </div>
        </div>
        <!--end::Row-->
    </div>
    <div class="container">
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $product["id"] ?>">
            <input type="hidden" name="imageOld" value="<?= $product["image"] ?>">
            <input type="hidden" name="kode_product" value="<?= $product["kode_product"] ?>">
            <!--begin::Body-->
            <div class="row">
                <div class="col-lg-6">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?= $product["name"] ?>" />
                            <?php if(session()->has("name")) : ?>
                                <p class="text-danger"><?= session()->getFlashdata("name") ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="categori" class="form-label">kategori</label>
                            <select id="categori" class="form-control" name="categori">
                                <option value="<?= $product["categori"] ?>" selected><?= $product["categori"] ?></option>
                                <option value="Alat Tulis Kertas">Alat Tulis Kertas</option>
                                <option value="Jasa atau Layanan">Jasa atau Layanan</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="price_buy" class="form-label">Harga Beli</label>
                            <input type="number" class="form-control" id="price_buy" name="price_buy" value="<?= $product["price_buy"] ?>"/>
                            <?php if(session()->has("price_buy")) : ?>
                                <p class="text-danger"><?= session()->getFlashdata("price_buy") ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="price_sale" class="form-label">Harga Jual</label>
                            <input type="number" class="form-control" id="price_sale" name="price_sale" value="<?= $product["price_sale"] ?>"/>
                            <?php if(session()->has("price_sale")) : ?>
                                <p class="text-danger"><?= session()->getFlashdata("price_sale") ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="qty" class="form-label">Stok</label>
                            <input type="number" class="form-control" id="qty" name="qty" value="<?= $product["qty"] ?>"/>
                            <?php if(session()->has("qty")) : ?>
                                <p class="text-danger"><?= session()->getFlashdata("qty") ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="image" name="image"/>
                            <?php if(session()->has("image")) : ?>
                                <p class="text-danger"><?= session()->getFlashdata("image") ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="supplier" class="form-label">Supplier</label>
                            <select id="supplier" class="form-control" name="supplier">
                                <?php foreach($suppliers as $supplier) : ?>
                                    <?php if($product["supplier"] == $supplier["id"]) : ?>
                                        <option value="<?= $product["supplier"] ?>" selected><?= $supplier["name"] ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <?php foreach($suppliers as $supplier) : ?>
                                    <option value="<?= $supplier["id"] ?>"><?= $supplier["name"] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?php if(session()->has("supplier")) : ?>
                                <p class="text-danger"><?= session()->getFlashdata("supplier") ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary d-block ms-auto">Kirim</button>
            </div>
        </form>
    </div>
    <!--end::Container-->
</div>
<!--end::App Content Header-->
<!--end::App Content-->
<?php $this->endSection() ?>