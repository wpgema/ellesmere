<?php $this->extend("Layout/templates") ?>
<?php $this->section("content") ?>
<!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
            <div class="col-sm-6"><h3 class="mb-0">Laporan Penjualan Bulanan</h3></div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Laporan Penjualan Bulanan</li>
            </ol>
            </div>
        </div>
        <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <div class="row justify-content-center mb-3 p-3 bg-white">
                <div class="col-lg-12">
                    <canvas id="myChartPenjualan"></canvas>
                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th>Tanggal</th>
                                <th>Pendapatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; foreach($penjualan as $pnjl) : ?>
                                <tr class="align-middle">
                                    <td style="width: 10px"><?= $i; ?></td>
                                    <td><?= $pnjl["tanggal"] ?></td>
                                    <td>Rp. <?= number_format($pnjl["total_price"]) ?></td>
                                </tr>
                            <?php $i++; endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/collect.js/4.18.3/collect.min.js" integrity="sha512-LkKpealLJ+RNIuYaXSC+l/0Zf5KjYCpMaUrON9WUC+LG316w3UEImyaUpWMWfqNGC4vLOkxDWEVKQE+Wp0shKg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>

        function getPenjualan(){
            $(document).ready(function () {
                // Data PHP yang sudah diubah menjadi JSON
                const phpData = <?php echo json_encode($penjualan); ?>;
                // Fungsi untuk memuat data menggunakan AJAX
                let penjualan = collect(phpData).map(function(item){
                    return item.total_price
                }).all();
                let tanggal = collect(phpData).map(function(item){
                    return item.tanggal
                }).all();
                const ctx = document.getElementById('myChartPenjualan');
                new Chart(ctx, {
                    type: 'line',
                    data: {
                    labels: tanggal,
                    datasets: [{
                        label: 'Tren Penjualan',
                        data: penjualan,
                        borderWidth: 2,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        pointBackgroundColor: 'rgba(75, 192, 192, 1)',
                        pointBorderColor: 'rgba(75, 192, 192, 1)',
                    }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            });
        }
        getPenjualan();
    </script>
    <!-- Page level plugins -->
    <script src="<?= base_url() ?>vendor-ex/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url() ?>vendor-ex/chart-area-demo.js"></script>
    <script src="<?= base_url() ?>vendor-ex/chart-pie-demo.js"></script>
<!--end::App Content-->
<?php $this->endSection() ?>