<?php $this->extend("Layout/templates") ?>
<?php $this->section("content") ?>
<!--begin::App Content Header-->
<div class="app-content-header">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6"><h3 class="mb-0">Supplier</h3></div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Supplier</li>
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
                            <label for="telp" class="form-label">No Handphone / Telephone</label>
                            <input type="text" class="form-control" id="telp" name="telp"/>
                            <?php if(session()->has("telp")) : ?>
                                <p class="text-danger"><?= session()->getFlashdata("telp") ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"/>
                            <?php if(session()->has("email")) : ?>
                                <p class="text-danger"><?= session()->getFlashdata("email") ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="address" name="address"/>
                            <?php if(session()->has("address")) : ?>
                                <p class="text-danger"><?= session()->getFlashdata("address") ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary d-block ms-auto">Kirim</button>
            </div>
        </form>
        <div class="p-3 bg-white mt-3">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 10px">No</th>
                        <th>Nama</th>
                        <th>Telp/Hp</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; foreach($suppliers as $supplier) : ?>
                        <tr class="align-middle">
                            <td style="width: 10px"><?= $i; ?></td>
                            <td><?= $supplier["name"] ?></td>
                            <td><?= $supplier["telp"] ?></td>
                            <td><?= $supplier["email"] ?></td>
                            <td><?= $supplier["address"] ?></td>
                            <td>
                                <!-- <a href="<?= base_url() ?>supplier/<?= $supplier["id"] ?>" class="border-0 my-1 btn btn-sm btn-primary"> <i class="bi bi-cart"></i> Beli Barang</a> -->
                                <form action="<?= base_url("") ?>supplier/<?= $supplier['id'] ?>" method="post" class="d-inline border-0">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="_method" value="PUT">
                                    <button type="submit" class="border-0 my-1 btn btn-sm btn-warning"><i class="bi bi-pencil-fill"></i> Ubah</button>
                                </form>
                                <form action="<?= base_url("") ?>supplier/<?= $supplier['id'] ?>" method="post" class="d-inline">
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