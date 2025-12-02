<?php $this->extend("Layout/templates") ?>
<?php $this->section("content") ?>
<!--begin::App Content Header-->
<div class="app-content-header">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6"><h3 class="mb-0">Supplier</h3></div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="<?= base_url("supplier") ?>">Supplier</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ubah</li>
            </ol>
            </div>
        </div>
        <!--end::Row-->
    </div>
    <div class="container-fluid">
        <form method="post">
            <input type="hidden" name="id" value="<?= $supplier["id"] ?>">
            <!--begin::Body-->
            <div class="row">
                <div class="col-lg-6">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?= $supplier["name"] ?>" />
                            <?php if(session()->has("name")) : ?>
                                <p class="text-danger"><?= session()->getFlashdata("name") ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="telp" class="form-label">No Handphone / Telephone</label>
                            <input type="text" class="form-control" id="telp" name="telp" value="<?= $supplier["telp"] ?>"  />
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
                            <input type="email" class="form-control" id="email" name="email" value="<?= $supplier["email"] ?>"  />
                            <?php if(session()->has("email")) : ?>
                                <p class="text-danger"><?= session()->getFlashdata("email") ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="address" name="address" value="<?= $supplier["address"] ?>"  />
                            <?php if(session()->has("address")) : ?>
                                <p class="text-danger"><?= session()->getFlashdata("address") ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Body-->
            <!--begin::Footer-->
            <div class="card-footer w-100" >
                <button type="submit" class="btn btn-primary d-block ms-auto">Kirim</button>
            </div>
            <!--end::Footer-->
        </form>
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