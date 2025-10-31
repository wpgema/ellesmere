<!doctype html>
<html lang="en">
  <!--begin::Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Portal Sistem Informasi Bengkel</title>
    <!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="AdminLTE v4 | Dashboard" />
    <meta name="author" content="ColorlibHQ" />
    <meta
      name="description"
      content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS."
    />
    <meta
      name="keywords"
      content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard"
    />
    <!--end::Primary Meta Tags-->
    <!--begin::Fonts-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
      integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
      crossorigin="anonymous"
    />
    <!--end::Fonts-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css"
      integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg="
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(OverlayScrollbars)-->
    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
      integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI="
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(Bootstrap Icons)-->
    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="<?= base_url() ?>css/adminlte.css" />
    <!--end::Required Plugin(AdminLTE)-->
    <!-- apexcharts -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
      integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0="
      crossorigin="anonymous"
    />
    <!-- jsvectormap -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css"
      integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4="
      crossorigin="anonymous"
    />
  </head>
  <!--end::Head-->
  <!--begin::Body-->
  <body class="layout-fixed">
    <!--begin::App Wrapper-->
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div id="container-kosong1" class="col-lg-3"></div>
            <div class="col-lg-6">
                <h6 class="fw-bold text-center">Suhaimi Percetakan</h6>
                <h6 class="fw-bold text-center">085272209948</h6>
                <h6 class="fw-bold text-center">Jl Provinsi Parit 2</h6>
                <?php if($sales) : ?>
                    <?php if($sales[0]["kode_product"] == "jasa_servis") : ?>
                        <table class="table m-auto">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th>Barang / Layanan</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; foreach($sales as $sale) : ?>
                                    <tr class="align-middle">
                                        <td style="width: 10px"><?= $i; ?></td>
                                        <td><?= $sale["product"] ?></td>
                                        <td>Rp. <?= number_format($sale["product_price"]) ?></td>
                                    </tr>
                                <?php $i++; endforeach; ?>
                                <?php if($sales) : ?>
                                    <tr class="align-middle">
                                        <td colspan="2">Total Harga Layanan</td>
                                        <td>Rp. <?= number_format($sales[0]["total_product"]) ?></td>
                                    </tr>
                                    <tr class="align-middle">
                                        <td colspan="2">Total Harga</td>
                                        <td>Rp. <?= number_format($sales[0]["total_price"]) ?></td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    <?php else : ?>
                        <table class="table m-auto">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th>Barang</th>
                                    <th>QTY</th>
                                    <th>Harga</th>
                                    <th>Sub Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; foreach($sales as $sale) : ?>
                                    <tr class="align-middle">
                                        <td style="width: 10px"><?= $i; ?></td>
                                        <td><?= $sale["product"] ?></td>
                                        <td><?= $sale["qty"] ?></td>
                                        <td>Rp. <?= number_format($sale["product_price"]) ?></td>
                                        <td>Rp. <?= number_format($sale["sub_total"]) ?></td>
                                    </tr>
                                <?php $i++; endforeach; ?>
                                <?php if($sales) : ?>
                                    <tr class="align-middle">
                                        <td colspan="4">Total Harga</td>
                                        <td>Rp. <?= number_format($sales[0]["total_price"]) ?></td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if($sales) : ?>
                    <div class="row">
                        <div class="col-6">
                            <h6 class="fw-semibold mt-3">Pelanggan : <?= $sales[0]["customer_name"] ?></h6>
                            <h6 class="fw-semibold">Telp : <?= $sales[0]["telp"] ?></h6>
                        </div>
                        <div class="col-6">
                            <h6 class="fw-semibold mt-3">Tanggal : <?php $sales[0]["transaksi_date"]; $date = new DateTime($sales[0]["transaksi_date"]); echo $date->format('d-m-Y');  ?></h6>
                            <h6 class="fw-semibold">Jam : <?php $sales[0]["created_at"]; $date = new DateTime($sales[0]["created_at"]); echo $date->format('H.i.s');  ?></h6>
                        </div>
                    </div>
                <?php endif; ?>
                <button href="" class="btn btn-sm btn-primary mt-3" id="tombol-struk">Cetak Struk</button>
            </div>
            <div id="container-kosong2" class="col-lg-3"></div>
        </div>
    </div>
    <!--end::App Wrapper-->
    <!--begin::Script-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script>
        const tombolPrint = document.getElementById("tombol-struk");
        const containerEmpty1 = document.getElementById("container-kosong1");
        const containerEmpty2 = document.getElementById("container-kosong2");
        tombolPrint.addEventListener("click", ()=>{
            tombolPrint.style.display = "none";
            containerEmpty1.style.display = "none";
            containerEmpty2.style.display = "none";
            window.print();
        })
    </script>
  </body>
  <!--end::Body-->
</html>
