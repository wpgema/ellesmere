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
                <h6 class="fw-bold text-center">Bengkel Beringin Jaya</h6>
                <h6 class="fw-bold text-center">081261530020</h6>
                <h6 class="fw-bold text-center">Jl Sungai Beringin No 12</h6>
                <?php if($paid_history) : ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th>Tanggal Pembelian</th>
                                <th>Kode Pembelian</th>
                                <th>Nama Barang</th>
                                <th>Supplier</th>
                                <th>Jumlah</th>
                                <th>Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; foreach($products as $detail) : ?>
                                <tr class="align-middle">
                                    <td style="width: 10px"><?= $i; ?></td>
                                    <td><?php $detail["updated_at"]; $date = new DateTime($detail["updated_at"]); echo $date->format('d-m-Y');  ?></td>
                                    <td><?= $detail["kode_pembelian"] ?></td>
                                    <td><?= $detail["product_name"] ?></td>
                                    <td><?= $detail["supplier_name"] ?></td>
                                    <td><?= $detail["qty"] ?></td>
                                    <td>Rp. <?= number_format($detail["sub_total"]) ?></td>
                                </tr>
                            <?php $i++; endforeach; ?>
                        </tbody>
                    </table>
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th>Nama Supplier</th>
                                <th>Total Pembelian</th>
                                <th>Tanggal Bayar</th>
                                <th>Jumlah Terbayar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; foreach($paid_history as $paid) : ?>
                                <tr class="align-middle">
                                    <td style="width: 10px"><?= $i; ?></td>
                                    <td><?= $paid["name"] ?></td>
                                    <td>Rp. <?= number_format($paid["price_buy"]) ?></td>
                                    <td><?php $paid["created_at"]; $date = new DateTime($paid["created_at"]); echo $date->format('d-m-Y');  ?></td>
                                    <td>Rp. <?= number_format($paid["paid_off"]) ?></td>
                                </tr>
                            <?php $i++; endforeach; ?>
                            <tr>
                                <th colspan="4">Total Pembayaran :</th>
                                <th colspan="2">Rp. <?= number_format($total_paid) ?></th>
                            </tr>
                            <tr>
                                <th colspan="4">Total Pembelian :</th>
                                <th colspan="2">Rp. <?= number_format($paid_history[0]["price_buy"]) ?></th>
                            </tr>
                            <tr>
                                <th colspan="4">Total Hutang :</th>
                                <th colspan="2">Rp. <?= number_format($paid_history[0]["price_buy"] - $total_paid) ?></th>
                            </tr>
                            <tr>
                                <th colspan="4">Status Pembayaran :</th>
                                <th colspan="2"><?= $paid_history[0]["status_bayar"] ?></th>
                            </tr>
                        </tbody>
                    </table>
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
