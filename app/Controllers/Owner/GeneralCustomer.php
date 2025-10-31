<?php

namespace App\Controllers\Owner;
use App\Models\SaleModel;
use App\Controllers\BaseController;

class GeneralCustomer extends BaseController
{
    private $customerModel;

    public function  __construct()
    {
        $this->authOwner();
        $this->customerModel = new SaleModel();
    }

    public function index()
    {
        $param["jenis_pemesanan"] = "booking offline";
        $data = [
            "customers" => $this->customerModel->getDataByJenisPemesanan($param["jenis_pemesanan"])
        ];
        return view('Owner/GeneralCustomer/index', $data);
    }

    public function detail($kode_penjualan){
        $data["sales"] = $this->customerModel->getDataPenjualanInnerJoinSaleDetailForBookingOffline($kode_penjualan);
        return view('Owner/GeneralCustomer/detail', $data);
    }

}
