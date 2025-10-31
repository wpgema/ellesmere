<?php $this->extend("Layout/templates") ?>
<?php $this->section("content") ?>
<!--begin::App Content Header-->
<div class="app-content-header">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6"><h3 class="mb-0">Pengeluaran</h3></div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="<?= base_url("pengeluaran") ?>">Pengeluaran</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ubah</li>
            </ol>
            </div>
        </div>
        <!--end::Row-->
    </div>
    <div class="container">
        <form method="post" action="<?= base_url("") ?>pengeluaran/<?= $expenditure['id'] ?>">
            <input type="hidden" name="id" value="<?= $expenditure["id"] ?>">
            <!--begin::Body-->
            <div class="row">
                <div class="col-lg-6">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="type" class="form-label">Jenis Pengeluaran</label>
                            <input type="text" class="form-control" id="type" name="type" value="<?= $expenditure["type"] ?>" />
                            <?php if(session()->has("type")) : ?>
                                <p class="text-danger"><?= session()->getFlashdata("type") ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control" id="description" name="description" value="<?= $expenditure["description"] ?>"  />
                            <?php if(session()->has("description")) : ?>
                                <p class="text-danger"><?= session()->getFlashdata("description") ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="date" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="date" name="date" value="<?= $expenditure["date"] ?>"  />
                            <?php if(session()->has("date")) : ?>
                                <p class="text-danger"><?= session()->getFlashdata("date") ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="amount" class="form-label">Jumlah</label>
                            <input type="text" class="form-control" id="amount" name="amount" value="<?= $expenditure["amount"] ?>"  />
                            <?php if(session()->has("amount")) : ?>
                                <p class="text-danger"><?= session()->getFlashdata("amount") ?></p>
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
<?php $this->endSection() ?>