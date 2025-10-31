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
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Produk / Layanan</li>
            </ol>
            </div>
        </div>
        <!--end::Row-->
    </div>
    <div class="container">
        <form method="post" enctype="multipart/form-data">
            <!--begin::Body-->
            <div class="row">
                <div class="col-lg-6">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name"/>
                            <?php if(session()->has("name")) : ?>
                                <p class="text-danger"><?= session()->getFlashdata("name") ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="categori" class="form-label">kategori</label>
                            <select id="categori" class="form-control" name="categori">
                                <option value="">--- Pilih Kategori ---</option>
                                <option value="Alat Tulis Kertas">Alat Tulis Kertas</option>
                                <option value="Jasa atau Layanan">Jasa atau Layanan</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="price_buy" class="form-label">Harga Beli</label>
                            <input type="number" class="form-control" id="price_buy" name="price_buy"/>
                            <?php if(session()->has("price_buy")) : ?>
                                <p class="text-danger"><?= session()->getFlashdata("price_buy") ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="price_sale" class="form-label">Harga Jual</label>
                            <input type="number" class="form-control" id="price_sale" name="price_sale"/>
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
                            <input type="number" class="form-control" id="qty" name="qty"/>
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
                                    <option value="<?= $supplier["id"] ?>"><?= $supplier["name"] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?php if(session()->has("supplier")) : ?>
                                <p class="text-danger"><?= session()->getFlashdata("supplier") ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary d-block ms-auto">Kirim</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="p-3 bg-white mt-3">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 10px">No</th>
                        <th>Kode Barang</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Gambar</th>
                        <th>Supplier</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; foreach($products as $product) : ?>
                        <tr class="align-middle">
                            <td style="width: 10px"><?= $i; ?></td>
                            <td><?= $product["kode_product"] ?></td>
                            <td><?= $product["name"] ?></td>
                            <td><?= $product["categori"] ?></td>
                            <td><?= $product["qty"] ?></td>
                            <td>Rp. <?= number_format($product["price_buy"]) ?></td>
                            <td>Rp. <?= number_format($product["price_sale"]) ?></td>
                            <td>
                                <img src="<?= base_url() ?>img/produk/<?= $product["image"] ?>" alt="" width="80px">
                            </td>
                            <td><?= $product["supplier"] ?></td>
                            <td>
                                <form action="<?= base_url("") ?>produk/<?= $product['id'] ?>" method="post" class="d-inline border-0">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="_method" value="PUT">
                                    <button type="submit" class="border-0 my-1 btn btn-sm btn-warning"><i class="bi bi-pencil-fill"></i> Ubah</button>
                                </form>
                                <form action="<?= base_url("") ?>produk/<?= $product['id'] ?>" method="post" class="d-inline">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="border-0 my-1 btn btn-sm btn-danger tombol-hapus"><i class="bi bi-trash"></i> Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php $i++; endforeach; ?>
                </tbody>
            </table>
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