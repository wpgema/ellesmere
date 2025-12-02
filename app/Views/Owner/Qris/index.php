<?php $this->extend("Layout/templates") ?>
<?php $this->section("content") ?>
<!--begin::App Content Header-->
<div class="app-content-header">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6"><h3 class="mb-0">Qris</h3></div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Qris</li>
            </ol>
            </div>
        </div>
        <!--end::Row-->
    </div>
    <div class="container-fluid">
        <?php if(empty($qries)) : ?>
            <form method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <!--begin::Body-->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="image" class="form-label">Qris</label>
                                <input type="file" class="form-control" id="image" name="image" required/>
                                <?php if(session()->has("image")) : ?>
                                    <p class="text-danger"><?= session()->getFlashdata("image") ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary d-block ms-auto">Kirim</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        <?php endif; ?>
        <div class="p-3 bg-white mt-3">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width: 10px">No</th>
                        <th>Qris</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; foreach($qries as $qris) : ?>
                        <tr class="align-middle">
                            <td style="width: 10px"><?= $i; ?></td>
                            <td>
                                <img src="<?= base_url() ?>img/qris/<?= $qris["qris"] ?>" class="m-3" alt="" width="150px">
                            </td>
                            <td>
                                <form action="<?= base_url("") ?>qris/<?= $qris['id'] ?>" method="post" class="d-inline">
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