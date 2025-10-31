<?php $this->extend("Layout/templates") ?>
<?php $this->section("content") ?>
<!--begin::App Content Header-->
<div class="app-content-header">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6"><h3 class="mb-0">Karyawan</h3></div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="<?= base_url("karyawan") ?>">Karyawan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ubah</li>
            </ol>
            </div>
        </div>
        <!--end::Row-->
    </div>
    <div class="container">
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $employe["id"] ?>">
            <input type="hidden" name="imageOld" value="<?= $employe["image"] ?>">
            <!--begin::Body-->
            <div class="row">
                <div class="col-lg-6">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?= $employe["name"] ?>" />
                            <?php if(session()->has("name")) : ?>
                                <p class="text-danger"><?= session()->getFlashdata("name") ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="telp" class="form-label">No Handphone / Telephone</label>
                            <input type="text" class="form-control" id="telp" name="telp" value="<?= $employe["telp"] ?>"  />
                            <?php if(session()->has("telp")) : ?>
                                <p class="text-danger"><?= session()->getFlashdata("telp") ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="address" name="address" value="<?= $employe["address"] ?>"  />
                            <?php if(session()->has("address")) : ?>
                                <p class="text-danger"><?= session()->getFlashdata("address") ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="position" class="form-label">Posisi</label>
                            <input type="text" class="form-control" id="position" name="position" value="<?= $employe["position"] ?>" />
                            <?php if(session()->has("position")) : ?>
                                <p class="text-danger"><?= session()->getFlashdata("position") ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="is_active" class="form-label">Aktif</label>
                            <select id="is_active" class="form-control" name="is_active">
                                <option value="<?= $employe["is_active"] ?>" selected><?= $employe["is_active"] == 1 ? "Aktif" : "Tidak Aktif" ?></option>
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
                            <?php if(session()->has("is_active")) : ?>
                                <p class="text-danger"><?= session()->getFlashdata("is_active") ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-2">
                                    <img src="<?= base_url() ?>img/karyawan/<?= $employe["image"] ?>" alt="" width="80px">
                                </div>
                                <div class="col-10">
                                    <label for="image" class="form-label">Gambar</label>
                                    <input type="file" class="form-control" id="image" name="image"/>
                                    <?php if(session()->has("image")) : ?>
                                        <p class="text-danger"><?= session()->getFlashdata("image") ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
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