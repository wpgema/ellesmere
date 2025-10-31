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
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pengeluaran</li>
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
                            <label for="type" class="form-label">Tipe Pengeluaran</label>
                            <input type="text" class="form-control" name="type" id="type" type="type"/>
                            <?php if(session()->has("type")) : ?>
                                <p class="text-danger"><?= session()->getFlashdata("type") ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <input type="text" class="form-control" id="description" name="description"/>
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
                            <input type="date" class="form-control" id="date" name="date"/>
                            <?php if(session()->has("date")) : ?>
                                <p class="text-danger"><?= session()->getFlashdata("date") ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="amount" class="form-label">Jumlah</label>
                            <input type="number" class="form-control" id="amount" name="amount"/>
                            <?php if(session()->has("amount")) : ?>
                                <p class="text-danger"><?= session()->getFlashdata("amount") ?></p>
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
                        <th>Jenis Pengeluaran</th>
                        <th>Deskripsi</th>
                        <th>Tanggal</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = isset($start) ? $start : 1; foreach($expenditures as $expenditure) : ?>
                        <tr class="align-middle">
                            <td style="width: 10px"><?= $i; ?></td>
                            <td><?= $expenditure["type"] ?></td>
                            <td><?= $expenditure["description"] ?></td>
                            <td><?php $expenditure["date"]; $date = new DateTime($expenditure["date"]); echo $date->format('d-m-Y');  ?></td>
                            <td><?= $expenditure["amount"] ?></td>
                            <td>
                                <form action="<?= base_url("") ?>pengeluaran/<?= $expenditure['id'] ?>" method="post" class="d-inline border-0">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="_method" value="PUT">
                                    <button type="submit" class="border-0 my-1 btn btn-sm btn-warning"><i class="bi bi-pencil-fill"></i> Ubah</button>
                                </form>
                                <form action="<?= base_url("") ?>pengeluaran/<?= $expenditure['id'] ?>" method="post" class="d-inline">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="border-0 my-1 btn btn-sm btn-danger tombol-hapus"><i class="bi bi-trash"></i> Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php $i++; endforeach; ?>
                </tbody>
            </table>
            <?php if(isset($pager) && $pager->getPageCount() > 1): ?>
                <div class="d-flex justify-content-end">
                    <?= $pager->links('default', 'adminlte_full'); ?>
                </div>
            <?php endif; ?>
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