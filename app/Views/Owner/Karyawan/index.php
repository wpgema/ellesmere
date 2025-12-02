<?php $this->extend("Layout/templates") ?>
<?php $this->section("content") ?>
<!--begin::App Content Header-->
<div class="app-content-header">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6"><h3 class="mb-0">Karyawan</h3></div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Karyawan</li>
            </ol>
            </div>
        </div>
        <!--end::Row-->
    </div>
    <div class="container-fluid">
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
                        <div class="mb-3">
                            <label for="address" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="address" name="address"/>
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
                            <input type="text" class="form-control" id="position" name="position"/>
                            <?php if(session()->has("position")) : ?>
                                <p class="text-danger"><?= session()->getFlashdata("position") ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="is_active" class="form-label">Status</label>
                            <select id="is_active" class="form-control" name="is_active">
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
                            <?php if(session()->has("is_active")) : ?>
                                <p class="text-danger"><?= session()->getFlashdata("is_active") ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="image" name="image"/>
                            <?php if(session()->has("image")) : ?>
                                <p class="text-danger"><?= session()->getFlashdata("image") ?></p>
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
        <div class="p-3 bg-white mt-3">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 10px">No</th>
                        <th>Nama</th>
                        <th>Telp/Hp</th>
                        <th>Alamat</th>
                        <th>Posisi</th>
                        <th>Aktif</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; foreach($employes as $employe) : ?>
                        <tr class="align-middle">
                            <td style="width: 10px"><?= $i; ?></td>
                            <td><?= $employe["name"] ?></td>
                            <td><?= $employe["telp"] ?></td>
                            <td><?= $employe["address"] ?></td>
                            <td><?= $employe["position"] ?></td>
                            <td><?= $employe["is_active"] == 1 ? "Aktif" : "Tidak Aktif" ?></td>
                            <td>
                                <img src="<?= base_url() ?>img/karyawan/<?= $employe["image"] ?>" alt="" width="80px">
                            </td>
                            <td>
                                <form action="<?= base_url("") ?>karyawan/<?= $employe['id'] ?>" method="post" class="d-inline border-0">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="_method" value="PUT">
                                    <button type="submit" class="border-0 my-1 btn btn-sm btn-warning"><i class="bi bi-pencil-fill"></i> Ubah</button>
                                </form>
                                <form action="<?= base_url("") ?>karyawan/<?= $employe['id'] ?>" method="post" class="d-inline">
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