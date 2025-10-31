<?php

namespace App\Controllers\Owner;
use App\Controllers\BaseController;
use App\Models\SaleModel;
use App\Models\DetailSaleModel;

class Penjualan extends BaseController
{
    private $customerModel;
    private $detailSaleModel;

    public function  __construct()
    {
        $this->authOwner();
        $this->customerModel = new SaleModel();
        $this->detailSaleModel = new DetailSaleModel();
    }

    public function index()
    {
        $perPage = 10;
        $page = (int) ($this->request->getVar('page') ?? 1);

        $customers = $this->customerModel->orderBy('id', 'DESC')->paginate($perPage);
        $pager = $this->customerModel->pager;

        $start = ($page > 0) ? (($page - 1) * $perPage) + 1 : 1;

        $data = [
            "customers" => $customers,
            "pager" => $pager,
            "start" => $start
        ];

        return view('Owner/Penjualan/index', $data);
    }

    public function detail($kode_penjualan){
        $data["sales"] = $this->customerModel->getDataPenjualanInnerJoinSaleDetailForBookingOffline($kode_penjualan);
        return view('Owner/Penjualan/detail', $data);
    }

    public function hapus($kode_penjualan)
    {
        $this->detailSaleModel->deleteDataByKodePenjualanOrBooking($kode_penjualan);
        $this->customerModel->deleteDataByKodePenjualanOrBooking($kode_penjualan);
        session()->setFlashdata('success', 'Data penjualan berhasil dihapus');
        return redirect()->to(base_url('penjualan'));
    }

}
