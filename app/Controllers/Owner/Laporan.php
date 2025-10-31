<?php

namespace App\Controllers\Owner;
use App\Controllers\BaseController;
use App\Models\SaleModel;
use App\Models\ExpendituresModel;

class Laporan extends BaseController
{
    private $saleModel;
    private $expendituresModel;

    public function  __construct()
    {
        $this->authOwner();
        $this->saleModel = new SaleModel();
        $this->expendituresModel = new ExpendituresModel();
    }

    public function laporanpenjualanbulanan()
    {
        $data = [
            "penjualan" => $this->saleModel->getDataLaporanPenjualanProdukBulanan()
        ];
        return view('Owner/Laporan/penjualan', $data);
    }

    public function laporanpenjualanharian($bulan)
    {
        $data = [
            "penjualan" => $this->saleModel->getDataLaporanPenjualanProdukHarian($bulan)
        ];
        return view('Owner/Laporan/detail-penjualan', $data);
    }

    public function laporanpengeluaranbulanan()
    {
        $data = [
            "pengeluaran" => $this->expendituresModel->getDataLaporanPengeluaranBulanan()
        ];
        return view('Owner/Laporan/pengeluaran', $data);
    }

    public function laporanpengeluaranharian($bulan)
    {
        $data = [
            "pengeluaran" => $this->expendituresModel->getDataLaporanPengeluaranHarian($bulan)
        ];
        return view('Owner/Laporan/detail-pengeluaran', $data);
    }

}
